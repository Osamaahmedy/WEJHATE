<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'فندق ميركيور عدن',
                'description' => 'يقع في منطقة خورمكسر الاستراتيجية، ويقدم إطلالات ساحرة على ساحل أبين وخدمات راقية لرجال الأعمال والسياح مع مرافق ترفيهية متكاملة.',
                'address' => 'خورمكسر، شارع أبين، عدن',
                'price_per_night' => 120.00,
                'image' => 'images/hotels/mercure.png',
                'rating' => 4.5,
                'rooms_available' => 12,
            ],
            [
                'name' => 'فندق ومنتجع شيراتون جولدموهور',
                'description' => 'يقع على شاطئ التواهي الذهبي الشهير، ويوفر شاليهات فاخرة وإطلالات بحرية مباشرة على خليج عدن مع مسبح خاص وشاطئ رملي ممتاز.',
                'address' => 'التواهي، ساحل جولدموهور، عدن',
                'price_per_night' => 180.00,
                'image' => 'images/hotels/goldmohur.png',
                'rating' => 4.8,
                'rooms_available' => 8,
            ],
            [
                'name' => 'فندق كورال عدن',
                'description' => 'فندق حديث وعصري يقع في قلب خورمكسر، ويتميز بغرف فسيحة ومطاعم تقدم أشهى المأكولات المحلية والعالمية، وهو مثالي للعائلات.',
                'address' => 'شارع العريش، خورمكسر، عدن',
                'price_per_night' => 95.00,
                'image' => 'images/hotels/coral.png',
                'rating' => 4.2,
                'rooms_available' => 15,
            ],
            [
                'name' => 'فندق القصر عدن',
                'description' => 'من أرقى وأفخم الفنادق في عدن، يقع في الحسوة ويتميز بمساحته الواسعة وتصميمه المعماري الفخم وحدائقه الخلابة وقاعاته الكبرى.',
                'address' => 'الحسوة، البريقة، عدن',
                'price_per_night' => 200.00,
                'image' => 'images/hotels/qasr.png',
                'rating' => 4.7,
                'rooms_available' => 20,
            ],
            [
                'name' => 'فندق عدن بلازا',
                'description' => 'فندق اقتصادي مميز يقع بالقرب من المراكز التجارية الرئيسية في المنصورة، ويوفر غرفاً مريحة ونظيفة مع إنترنت سريع وخدمة غرف على مدار الساعة.',
                'address' => 'المنصورة، شارع التسعين، عدن',
                'price_per_night' => 60.00,
                'image' => 'images/hotels/plaza.png',
                'rating' => 4.0,
                'rooms_available' => 10,
            ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
