<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Destinasi;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('1234'),
            'role' => UserRole::User,
        ]);


        // Seed Categories
        $categories = [
            ['name' => 'Wisata Alam', 'slug' => 'wisata-alam', 'description' => 'Destinasi wisata alam'],
            ['name' => 'Wisata Budaya', 'slug' => 'wisata-budaya', 'description' => 'Destinasi wisata budaya'],
            ['name' => 'Wisata Kuliner', 'slug' => 'wisata-kuliner', 'description' => 'Destinasi wisata kuliner'],
            ['name' => 'Wisata Sejarah', 'slug' => 'wisata-sejarah', 'description' => 'Destinasi wisata sejarah'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Seed Destinations
        $destinations = [
            [
                'name' => 'Curug Cipendok',
                'description' => 'Air terjun yang indah dengan ketinggian 92 meter, dikelilingi hutan pinus yang asri. Tempat yang sempurna untuk refreshing dan menikmati keindahan alam.',
                'image' => 'Curug-Cipendok.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.6,
                'price' => 15000.00,
                'location' => 'Cilongok, Banyumas',
                'featured' => true
            ],
            [
                'name' => 'Baturraden',
                'description' => 'Objek wisata pegunungan dengan pemandian air panas alami, udara sejuk, dan berbagai wahana menarik untuk keluarga.',
                'image' => 'Baturradenn.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.4,
                'price' => 25000.00,
                'location' => 'Baturraden, Banyumas',
                'featured' => true
            ],
            [
                'name' => 'Museum Wayang',
                'description' => 'Museum yang menyimpan koleksi wayang terlengkap di Indonesia, menampilkan kekayaan budaya tradisional Jawa.',
                'image' => 'Museum-Wayang.jpg',
                'category' => 'Wisata Budaya',
                'rating' => 4.2,
                'price' => 10000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Telaga Sunyi',
                'description' => 'Danau kecil yang tenang di tengah hutan, tempat yang sempurna untuk meditasi dan menikmati keheningan alam.',
                'image' => 'Telaga-Sunyi.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.3,
                'price' => 12000.00,
                'location' => 'Kemranjen, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Pendopo Si Panji',
                'description' => 'Bangunan bersejarah peninggalan Kerajaan Pajang dengan arsitektur tradisional Jawa yang megah.',
                'image' => 'Pendopo-Si-Panji.jpg',
                'category' => 'Wisata Sejarah',
                'rating' => 4.0,
                'price' => 8000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Goa Sarabadak',
                'description' => 'Goa alam dengan stalaktit dan stalakmit yang menakjubkan, petualangan seru untuk para pencinta speleologi.',
                'image' => 'Goa-Sarabadak.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.1,
                'price' => 20000.00,
                'location' => 'Karanglewas, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Owabong Water Park',
                'description' => 'Taman air terbesar di Jawa Tengah dengan berbagai wahana seru dan kolam renang untuk semua usia.',
                'image' => 'owabong13.jpeg',
                'category' => 'Wisata Alam',
                'rating' => 4.5,
                'price' => 35000.00,
                'location' => 'Purbalingga, Banyumas',
                'featured' => true
            ],
            [
                'name' => 'Sate Buntel Pak Gambir',
                'description' => 'Kuliner khas Banyumas berupa sate daging kambing yang dibungkus lemak, cita rasa autentik yang tak terlupakan.',
                'image' => 'Sate-Buntel-Pak-Gambir.jpg',
                'category' => 'Wisata Kuliner',
                'rating' => 4.7,
                'price' => 5000.00,
                'location' => 'Sokaraja, Banyumas',
                'featured' => true
            ],
            [
                'name' => 'Curug Jenggala',
                'description' => 'Air terjun tersembunyi dengan tiga tingkatan yang indah, cocok untuk hiking dan fotografi alam.',
                'image' => 'Curug-Jenggala.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.3,
                'price' => 10000.00,
                'location' => 'Kalipagu, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Mendut Noodle',
                'description' => 'Rumah mie legendaris Banyumas dengan kuah kaldu sapi yang gurih dan mie kenyal buatan sendiri.',
                'image' => 'Mendut-Noodle.jpg',
                'category' => 'Wisata Kuliner',
                'rating' => 4.4,
                'price' => 18000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false
            ],
            [
                'name' => 'Gunung Slamet',
                'description' => 'Gunung tertinggi di Jawa Tengah dengan pendakian menantang dan pemandangan sunrise yang spektakuler.',
                'image' => 'slamet13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.8,
                'price' => 50000.00,
                'location' => 'Baturraden, Banyumas',
                'featured' => true
            ],
            [
                'name' => 'Alun-alun Purwokerto',
                'description' => 'Pusat kota dengan taman yang asri, tempat berkumpul masyarakat dan berbagai acara budaya.',
                'image' => 'Alun-Alun-Purwokerto.jpg',
                'category' => 'Wisata Budaya',
                'rating' => 4.0,
                'price' => 0.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false
            ]
        ];

        foreach ($destinations as $destinasi) {
            Destinasi::create($destinasi);
        }
    }
}
