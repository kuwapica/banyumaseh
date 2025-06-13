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
                'image' => 'cipendok13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.6,
                'price' => 15000.00,
                'location' => 'Cilongok, Banyumas',
                'featured' => true,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Baturraden',
                'description' => 'Objek wisata pegunungan dengan pemandian air panas alami, udara sejuk, dan berbagai wahana menarik untuk keluarga.',
                'image' => 'baturraden13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.4,
                'price' => 25000.00,
                'location' => 'Baturraden, Banyumas',
                'featured' => true,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Museum Wayang',
                'description' => 'Museum yang menyimpan koleksi wayang terlengkap di Indonesia, menampilkan kekayaan budaya tradisional Jawa.',
                'image' => 'museum13.jpeg',
                'category' => 'Wisata Budaya',
                'rating' => 4.2,
                'price' => 10000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Telaga Sunyi',
                'description' => 'Danau kecil yang tenang di tengah hutan, tempat yang sempurna untuk meditasi dan menikmati keheningan alam.',
                'image' => 'telagasunyi13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.3,
                'price' => 12000.00,
                'location' => 'Kemranjen, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Golaga Purbalingga',
                'description' => 'Obyek wisata Goa Lawa yang tersusun dari batuan lava sangat unik dan menarik jika fokus dikembangkan sebagai wisata geologis (geowisata).',
                'image' => 'golaga13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.3,
                'price' => 25000.00,
                'location' => 'Purbalingga, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Goa Sarabadak',
                'description' => 'Goa alam dengan stalaktit dan stalakmit yang menakjubkan, petualangan seru untuk para pencinta speleologi.',
                'image' => 'Goa-Sarabadak.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.1,
                'price' => 20000.00,
                'location' => 'Karanglewas, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Owabong Water Park',
                'description' => 'Taman air terbesar di Jawa Tengah dengan berbagai wahana seru dan kolam renang untuk semua usia.',
                'image' => 'owabong13.jpeg',
                'category' => 'Wisata Alam',
                'rating' => 4.5,
                'price' => 35000.00,
                'location' => 'Purbalingga, Banyumas',
                'featured' => true,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Taman Mas Kemambang',
                'description' => 'Area rekreasi indah dengan mainan anak-anak warna warni, kolam ikan & jalan beraspal.',
                'image' => 'kemambang13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.5,
                'price' => 2000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => true,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Curug Jenggala',
                'description' => 'Air terjun tersembunyi dengan tiga tingkatan yang indah, cocok untuk hiking dan fotografi alam.',
                'image' => 'jenggala13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.3,
                'price' => 10000.00,
                'location' => 'Kalipagu, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Hutan Pinus Limpakuwus',
                'description' => 'Hutan Pinus Limpakuwus merupakan hutan yang berada di kawasan wisata Baturaden, yang berada di ketinggian 750 mdpl.',
                'image' => 'hutanpinus13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.6,
                'price' => 17500.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Gunung Slamet',
                'description' => 'Gunung tertinggi di Jawa Tengah dengan pendakian menantang dan pemandangan sunrise yang spektakuler.',
                'image' => 'slamet13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.8,
                'price' => 50000.00,
                'location' => 'Baturraden, Banyumas',
                'featured' => true,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Baturraden Adventure Forest',
                'description' => 'Taman petualangan yang luas di hutan dengan aktivitas berkemah, paintball, menuruni tebing, dan lainnya.',
                'image' => 'forest13.jpg',
                'category' => 'Wisata Alam',
                'rating' => 4.6,
                'price' => 5000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Museum Panglima Besar Jenderal Soordirman',
                'description' => 'Museum Pangsar Soedirman atau lebih dikenal sebagai Museum Panglima Besar Jendral Soedirman. Museum ini merupakan objek wisata budaya berbasis edukasi yang menyimpan sisi sejarah dari perjuangan Jendral Soedirman.',
                'image' => 'museum_soedirman13.jpeg',
                'category' => 'Wisata Sejarah',
                'rating' => 4.5,
                'price' => 10000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Museum Bank Rakyat Indonesia',
                'description' => 'Museum BRI merupakan satu-satunya museum perbankan yang ada di Indonesia yang terletak di pusat kota Purwokerto.',
                'image' => 'museum_bri13.jpg',
                'category' => 'Wisata Sejarah',
                'rating' => 4.5,
                'price' => 5000.00,
                'location' => 'Purwokerto, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ],
            [
                'name' => 'Klenteng Boen Tek Bio',
                'description' => 'Sebagai rumah ibadah, kelenteng ini memeluk tiga ajaran utama yang dikenal sebagai Tri Dharma, yaitu agama Buddha, Tao, dan Khonghucu.',
                'image' => 'klenteng13.jpg',
                'category' => 'Wisata Budaya',
                'rating' => 4.6,
                'price' => 5000.00,
                'location' => 'Sudagaran, Banyumas',
                'featured' => false,
                'facilities' => json_encode([
                    'Parkir luas',
                    'Toilet bersih',
                    'Mushola',
                    'Warung makan',
                    'Spot foto',
                    'Pemandu wisata',
                ]),
                'operating_hours' => json_encode([
                    [
                        'hari' => 'Senin - Jumat',
                        'jam'  => '08:00 - 17:00',
                    ],
                    [
                        'hari' => 'Sabtu - Minggu',
                        'jam'  => '07:00 - 18:00',
                    ],
                    [
                        'hari' => 'Libur Nasional',
                        'jam'  => '07:00 - 18:00',
                    ],
                ]),
            ]
        ];

        foreach ($destinations as $destinasi) {
            Destinasi::create($destinasi);
        }
    }
}
