<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_page_contents', function (Blueprint $table) {
            $table->string('hero_title_en')->nullable()->after('hero_title');
            $table->text('hero_subtitle_en')->nullable()->after('hero_subtitle');
            $table->string('hero_cta_text_en')->nullable()->after('hero_cta_text');
            $table->string('benefits_title_en')->nullable()->after('benefits_title');
            $table->text('benefits_content_en')->nullable()->after('benefits_content');
            $table->string('ingredients_title_en')->nullable()->after('ingredients_title');
            $table->text('ingredients_content_en')->nullable()->after('ingredients_content');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_page_contents', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_en',
                'hero_subtitle_en',
                'hero_cta_text_en',
                'benefits_title_en',
                'benefits_content_en',
                'ingredients_title_en',
                'ingredients_content_en'
            ]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });
    }
};
