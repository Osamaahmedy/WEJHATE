<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = [
            [
                'name' => 'صالح بن يافع',
                'phone' => '+967 771 234 567',
                'car_model' => 'تويوتا كامري 2020 (لون أبيض)',
                'license_plate' => 'عدن - 1245 / مؤقت',
                'avatar' => 'images/drivers/saleh.jpg',
                'rating' => 4.9,
                'status' => 'available',
            ],
            [
                'name' => 'محمد العدني',
                'phone' => '+967 733 987 654',
                'car_model' => 'هيونداي إلنترا 2019 (لون فضي)',
                'license_plate' => 'عدن - 9382 / خصوصي',
                'avatar' => 'images/drivers/mohamed.jpg',
                'rating' => 4.7,
                'status' => 'available',
            ],
            [
                'name' => 'عوض الصبيحي',
                'phone' => '+967 711 456 789',
                'car_model' => 'تويوتا كورولا 2021 (لون رمادي)',
                'license_plate' => 'عدن - 5647 / أجرة',
                'avatar' => 'images/drivers/awadh.jpg',
                'rating' => 4.8,
                'status' => 'available',
            ],
            [
                'name' => 'مازن الفضلي',
                'phone' => '+967 735 112 233',
                'car_model' => 'كيا أوبتيما 2018 (لون أسود)',
                'license_plate' => 'عدن - 8749 / مؤقت',
                'avatar' => 'images/drivers/mazen.jpg',
                'rating' => 4.5,
                'status' => 'busy',
            ],
        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}
