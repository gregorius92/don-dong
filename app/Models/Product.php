<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'description',
        'description_en',
        'ingredients',
        'nutrition_highlights',
        'price_display',
        'image_path',
        'is_active',
    ];

    public function translate($field)
    {
        $locale = app()->getLocale();
        if ($locale !== 'id') {
            $translatedField = $field . '_' . $locale;
            if (!empty($this->{$translatedField})) {
                return $this->{$translatedField};
            }
        }
        return $this->{$field};
    }
}
