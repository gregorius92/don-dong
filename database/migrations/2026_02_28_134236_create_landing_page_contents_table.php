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
        Schema::create('landing_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('Segarnya Kedondong Asli, Sekali Seduh!');
            $table->string('hero_subtitle')->default('DonDong! Minuman serbuk dari kedondong asli, segar dan alami.');
            $table->string('hero_cta_text')->default('Beli Sekarang');
            $table->string('hero_cta_link')->default('#');
            $table->string('hero_image')->nullable();
            
            $table->string('benefits_title')->default('Kenapa DonDong!?');
            $table->text('benefits_content')->nullable();
            
            $table->string('ingredients_title')->default('Bahan Alami Pilihan');
            $table->text('ingredients_content')->nullable();
            $table->string('ingredients_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_page_contents');
    }
};
