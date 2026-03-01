<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin User
        \App\Models\User::create([
            'name' => 'Admin DonDong!',
            'email' => 'admin@dondong.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Landing Page Content
        \App\Models\LandingPageContent::create([
            'hero_title' => 'Segarnya Kedondong Asli, Sekali Seduh!',
            'hero_title_en' => 'The Freshness of Authentic Ambarella, Ready to Brew!',
            'hero_subtitle' => 'DonDong! menghadirkan kebaikan buah kedondong tropis dalam bentuk serbuk praktis yang kaya vitamin C dan serat.',
            'hero_subtitle_en' => 'Enjoy the sensation of natural sweet and sour ambarella fruit mixed with special ingredients to instantly lift your mood.',
            'hero_cta_text' => 'Pesan Sekarang',
            'hero_cta_text_en' => 'Buy Now',
            'hero_cta_link' => '#contact',
            'benefits_title' => 'Kenapa DonDong!?',
            'benefits_title_en' => 'Why Choose DonDong!?',
            'benefits_content' => '100% Buah Kedondong Asli, Tanpa Pemanis Buatan, Praktis & Higienis, Menyegarkan & Kaya Nutrisi.',
            'benefits_content_en' => 'Enjoy various benefits of natural ambarella for your daily health.',
            'ingredients_title' => 'Dibuat Dari Alam',
            'ingredients_title_en' => 'Made From Natural Ingredients',
            'ingredients_content' => 'Kami menggunakan kedondong pilihan terbaik dari petani lokal untuk memastikan rasa asam-manis yang autentik dan kualitas nutrisi yang terjaga.',
            'ingredients_content_en' => 'DonDong! is processed from selected ambarella fruit equipped with natural ingredients that are beneficial for your body.',
        ]);

        // Sample Products
        $products = [
            [
                'name' => 'DonDong! Original Sachet',
                'name_en' => 'DonDong! Original Box',
                'slug' => 'dondong-original-sachet',
                'description' => 'Bubuk minuman kedondong asli kemasan sachet isi 10. Mudah dibawa kemana saja!',
                'description_en' => 'Enjoy the authentic and fresh taste of original ambarella. One box contains 10 practical sachets ready to brew wherever you are.',
                'ingredients' => 'Ekstrak Kedondong, Gula Tebu, Vitamin C.',
                'nutrition_highlights' => 'Tinggi Vitamin C, Serat Alami, Rendah Kalori.',
                'price_display' => 'Rp 25.000 / Box (10 Sachet)',
                'is_active' => true,
            ],
            [
                'name' => 'DonDong! Less Sugar Sachet',
                'name_en' => 'DonDong! Mint Refresh',
                'slug' => 'dondong-less-sugar-sachet',
                'description' => 'Varian rendah gula untuk kamu yang sedang menjaga asupan kalori namun tetap ingin kesegaran kedondong.',
                'description_en' => 'A new dimension of freshness! The blend of sweet-sour ambarella with a freezing mint sensation. Perfect for hot weather.',
                'ingredients' => 'Ekstrak Kedondong, Gula Tebu (Sedikit), Stevia, Vitamin C.',
                'nutrition_highlights' => 'Sangat Rendah Kalori, Tinggi Vitamin C.',
                'price_display' => 'Rp 28.000 / Box (10 Sachet)',
                'is_active' => true,
            ],
            [
                'name' => 'DonDong! Family Size',
                'name_en' => 'DonDong! Honey Boost',
                'slug' => 'dondong-family-size',
                'description' => 'Kemasan besar 500g untuk dinikmati bersama seluruh anggota keluarga di rumah.',
                'description_en' => 'The goodness of pure honey combined with fresh ambarella. Better for maintaining endurance and immunity naturally.',
                'ingredients' => 'Ekstrak Kedondong, Gula Tebu, Vitamin C.',
                'nutrition_highlights' => 'Tinggi Vitamin C, Ekstra Hemat.',
                'price_display' => 'Rp 85.000 / Pouch (500g)',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }

        $faker = \Faker\Factory::create('id_ID');

        // // Additional 17 products to reach 20
        // for ($i = 0; $i < 17; $i++) {
        //     $name = 'DonDong! ' . ucwords($faker->words(2, true)) . ' ' . $faker->randomElement(['Sachet', 'Box', 'Pouch', 'Botol']);
        //     \App\Models\Product::create([
        //         'name' => $name,
        //         'slug' => \Illuminate\Support\Str::slug($name) . '-' . rand(1000, 9999),
        //         'description' => $faker->sentence(10),
        //         'ingredients' => 'Ekstrak Kedondong, Gula Tebu, ' . $faker->word() . ', Vitamin C.',
        //         'nutrition_highlights' => 'Tinggi Vitamin C, ' . $faker->randomElement(['Rendah Kalori', 'Serat Alami', 'Kaya Antioksidan']),
        //         'price_display' => 'Rp ' . number_format($faker->numberBetween(15, 100) * 1000, 0, ',', '.') . ' / ' . $faker->randomElement(['Box', 'Pouch', 'Botol']),
        //         'is_active' => $faker->boolean(80),
        //     ]);
        // }

        // Global Settings
        $settings = [
            'site_name' => 'DonDong!',
            'meta_title' => 'DonDong! - Segarnya Kedondong Asli',
            'meta_title_en' => 'DonDong! - Fresh Authentic Ambarella',
            'meta_description' => 'Minuman serbuk kedondong asli 100% natural. Segar, sehat, dan praktis.',
            'meta_description_en' => '100% natural authentic ambarella juice drink, without artificial preservatives. Refresh your mood directly with one brew!',
            'whatsapp_number' => '6281234567890',
            'instagram_url' => 'https://instagram.com/dondong_id',
            'tiktok_url' => 'https://tiktok.com/@dondong_id',
            'youtube_url' => 'https://youtube.com/@dondong_id',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\GlobalSetting::create(['key' => $key, 'value' => $value]);
        }

        // Testimonials
        $testimonials = [
            [
                'author_name' => 'Budi Santoso',
                'content' => 'Rasa kedondongnya beneran kerasa, seger banget diminum siang-siang!',
                'content_en' => 'The authentic ambarella taste is really noticeable, so refreshing to drink in the afternoon!',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'author_name' => 'Siti Aminah',
                'content' => 'Anak-anak suka banget varian yang less sugar. Praktis buat bekal sekolah dan sehat karena kaya vitamin C.',
                'content_en' => 'My kids really love the less sugar variant. Practical for lunchbox and healthy due to the rich vitamin C.',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'author_name' => 'Andi Wijaya',
                'content' => 'Sering order yang family size buat stok di kantor. Ampuh banget buat balikin mata ngantuk abis makan siang.',
                'content_en' => 'I often order the family size to stock up at the office. Really effective to treat sleepiness after lunch.',
                'rating' => 4,
                'is_visible' => true,
            ],
            [
                'author_name' => 'Rina Kartika',
                'content' => 'Harganya lumayan terjangkau buat kantong mahasiswa. Paling suka dicampur es batu banyak-banyak.',
                'content_en' => 'The price is quite affordable for a student. My favorite way to drink it is with lots of ice cubes.',
                'rating' => 5,
                'is_visible' => true,
            ]
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }
    }
}
