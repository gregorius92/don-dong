<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_title',
        'content',
        'content_en',
        'rating',
        'avatar_path',
        'is_visible',
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
