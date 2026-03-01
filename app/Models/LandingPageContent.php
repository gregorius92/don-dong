<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_title_en',
        'hero_subtitle',
        'hero_subtitle_en',
        'hero_cta_text',
        'hero_cta_text_en',
        'hero_image',
        'benefits_title',
        'benefits_title_en',
        'benefits_content',
        'benefits_content_en',
        'ingredients_title',
        'ingredients_title_en',
        'ingredients_content',
        'ingredients_content_en',
        'ingredients_image',
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
