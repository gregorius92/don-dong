<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'opening_hours',
        'maps_url',
        'maps_embed',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * Scope for active stores only
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by city
     */
    public function scopeInCity($query, $city)
    {
        if (!empty($city) && $city !== 'all') {
            return $query->where('city', $city);
        }
        return $query;
    }

    /**
     * Get safe Google Maps embed src for iframe
     */
    public function getEmbedSrcAttribute(): string
    {
        if (!empty($this->maps_embed)) {
            // If user pasted whole <iframe> tag, extract src
            if (preg_match('/src=["\']([^"\']+)["\']/', $this->maps_embed, $matches)) {
                return $matches[1];
            }
            if (filter_var($this->maps_embed, FILTER_VALIDATE_URL)) {
                return $this->maps_embed;
            }
        }

        // If coordinates available
        if (!empty($this->latitude) && !empty($this->longitude)) {
            return 'https://maps.google.com/maps?q=' . $this->latitude . ',' . $this->longitude . '&hl=id&z=15&output=embed';
        }

        // Fallback to location name and address
        $query = trim($this->name . ' ' . $this->address . ' ' . $this->city);
        return 'https://maps.google.com/maps?q=' . urlencode($query) . '&hl=id&z=15&output=embed';
    }

    /**
     * Get direct Google Maps navigation URL
     */
    public function getGoogleMapsLinkAttribute(): string
    {
        if (!empty($this->maps_url) && filter_var($this->maps_url, FILTER_VALIDATE_URL)) {
            return $this->maps_url;
        }

        if (!empty($this->latitude) && !empty($this->longitude)) {
            return 'https://www.google.com/maps/search/?api=1&query=' . $this->latitude . ',' . $this->longitude;
        }

        $query = trim($this->name . ', ' . $this->address . ', ' . $this->city);
        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($query);
    }

    /**
     * Format phone number to clean WhatsApp international URL
     */
    public function getWhatsappUrlAttribute(): ?string
    {
        if (empty($this->phone)) {
            return null;
        }

        // Remove non-numeric characters
        $cleanNumber = preg_replace('/[^0-9]/', '', $this->phone);

        // Convert leading 0 to 62
        if (str_starts_with($cleanNumber, '0')) {
            $cleanNumber = '62' . substr($cleanNumber, 1);
        } elseif (str_starts_with($cleanNumber, '8')) {
            $cleanNumber = '62' . $cleanNumber;
        }

        $message = urlencode("Halo {$this->name}, saya ingin menanyakan ketersediaan produk Dong.");
        return "https://wa.me/{$cleanNumber}?text={$message}";
    }
}
