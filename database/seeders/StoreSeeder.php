<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'name' => 'DonDong Flagship Experience Grand Indonesia',
                'city' => 'Jakarta Pusat',
                'address' => 'Mall Grand Indonesia East Mall Lantai LG No. 15, Jl. M.H. Thamrin No. 1, Menteng, Jakarta Pusat',
                'phone' => '081288991122',
                'opening_hours' => '10:00 - 22:00 WIB (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Grand+Indonesia+Jakarta',
                'maps_embed' => 'https://maps.google.com/maps?q=Grand+Indonesia+Jakarta&hl=id&z=15&output=embed',
                'latitude' => -6.195123,
                'longitude' => 106.823456,
                'is_active' => true,
            ],
            [
                'name' => 'DonDong Refreshment Store Senayan City',
                'city' => 'Jakarta Selatan',
                'address' => 'Senayan City Mall Lower Ground Floor No. 24, Jl. Asia Afrika No. 19, Gelora, Tanah Abang, Jakarta Selatan',
                'phone' => '081288991133',
                'opening_hours' => '10:00 - 22:00 WIB (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Senayan+City+Jakarta',
                'maps_embed' => 'https://maps.google.com/maps?q=Senayan+City+Jakarta&hl=id&z=15&output=embed',
                'latitude' => -6.227234,
                'longitude' => 106.797890,
                'is_active' => true,
            ],
            [
                'name' => 'DonDong Tropical Oasis Paris Van Java',
                'city' => 'Bandung',
                'address' => 'Paris Van Java Resort Glamour Level G-11, Jl. Sukajadi No. 131-139, Cipedes, Sukajadi, Kota Bandung',
                'phone' => '082211445566',
                'opening_hours' => '10:00 - 22:00 WIB (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Paris+Van+Java+Bandung',
                'maps_embed' => 'https://maps.google.com/maps?q=Paris+Van+Java+Bandung&hl=id&z=15&output=embed',
                'latitude' => -6.889123,
                'longitude' => 107.596456,
                'is_active' => true,
            ],
            [
                'name' => 'DonDong Outlet Pakuwon Mall',
                'city' => 'Surabaya',
                'address' => 'Pakuwon Mall Food Society Level 2 No. 8, Jl. Mayjend. Jonosewojo No. 2, Babatan, Wiyung, Surabaya',
                'phone' => '083811223344',
                'opening_hours' => '10:00 - 21:30 WIB (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Pakuwon+Mall+Surabaya',
                'maps_embed' => 'https://maps.google.com/maps?q=Pakuwon+Mall+Surabaya&hl=id&z=15&output=embed',
                'latitude' => -7.289123,
                'longitude' => 112.675456,
                'is_active' => true,
            ],
            [
                'name' => 'DonDong Tropical Beachwalk Kuta Bali',
                'city' => 'Denpasar',
                'address' => 'Beachwalk Shopping Center Ground Floor No. A-12, Jl. Pantai Kuta, Kuta, Kabupaten Badung, Bali',
                'phone' => '081999887766',
                'opening_hours' => '10:00 - 23:00 WITA (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Beachwalk+Shopping+Center+Bali',
                'maps_embed' => 'https://maps.google.com/maps?q=Beachwalk+Shopping+Center+Bali&hl=id&z=15&output=embed',
                'latitude' => -8.718123,
                'longitude' => 115.169456,
                'is_active' => true,
            ],
            [
                'name' => 'DonDong Corner Plaza Malioboro',
                'city' => 'Yogyakarta',
                'address' => 'Plaza Malioboro Lantai 1 No. 8, Jl. Malioboro No. 52-58, Suryatmajan, Danurejan, Kota Yogyakarta',
                'phone' => '087711223344',
                'opening_hours' => '10:00 - 21:00 WIB (Buka Setiap Hari)',
                'maps_url' => 'https://www.google.com/maps/search/?api=1&query=Plaza+Malioboro+Yogyakarta',
                'maps_embed' => 'https://maps.google.com/maps?q=Plaza+Malioboro+Yogyakarta&hl=id&z=15&output=embed',
                'latitude' => -7.792123,
                'longitude' => 110.366456,
                'is_active' => true,
            ],
        ];

        foreach ($stores as $storeData) {
            Store::updateOrCreate(
                ['name' => $storeData['name']],
                $storeData
            );
        }
    }
}
