<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Untuk seedingnya saya meminta bantuan AI

        DB::table('memberships')->insert([
            [
                'name' => 'Weekly Membership',
                'description' => 'Paket membership mingguan yang cocok untuk pengguna yang ingin mencoba layanan dalam waktu singkat tanpa komitmen jangka panjang.',
                'price' => 25000,
                'duration' => 7,
                'discount' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monthly Membership',
                'description' => 'Paket membership bulanan dengan harga lebih hemat dibandingkan paket mingguan. Cocok untuk penggunaan rutin selama satu bulan penuh.',
                'price' => 90000,
                'duration' => 30,
                'discount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quarterly Membership',
                'description' => 'Paket membership 3 bulan dengan harga paling hemat. Ideal bagi pengguna yang ingin menggunakan layanan lebih lama dengan biaya lebih efisien.',
                'price' => 240000,
                'duration' => 90,
                'discount' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

       
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '08123456789',
                'created_at' => now(),
            ],
            [
                'name' => 'evan',
                'email' => 'evan@gmail.com',
                'password' => Hash::make('evan1234'),
                'role' => 'user',
                'phone' => '08987654321',
                'created_at' => now(),
            ],
        ]);


       
        $categories = [
            ['name' => 'Diamond', 'default_image' => 'dm.png', 'priority' => false],
            ['name' => 'Membership', 'default_image' => 'membership.jfif', 'priority' => true],
            ['name' => 'Voucher', 'default_image' => 'voucher.png', 'priority' => false],
            ['name' => 'Items', 'default_image' => 'items.png', 'priority' => false],
            ['name' => 'Points', 'default_image' => 'points.png', 'priority' => false],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $id = DB::table('categories')->insertGetId(array_merge($cat, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
            $categoryMap[$cat['name']] = $id;
        }

       
        $games = [
            'Mobile Legends',
            'Free Fire',
            'Genshin Impact',
            'PUBG Mobile',
            'Valorant',
            'Roblox',
            'Call of Duty Mobile',
            'League of Legends',
            'Minecraft',
            'Apex Legends',
            'Clash of Clans',
            'Steam Wallet',
            'Honkai Star Rail',
            'Point Blank',
            'Honor of Kings'
        ];

        foreach ($games as $gameName) {
            $gameId = DB::table('games')->insertGetId([
                'name' => $gameName,
                'slug' => Str::slug($gameName),
                'region' => 'Global',
                'publisher' => 'Publisher ' . $gameName,
                'is_active' => true,
                'description' => "Layanan top up resmi $gameName.",
                'image' => Str::slug($gameName) . ".jpg",
                'created_at' => now(),
                'updated_at' => now()
            ]);

           
            if ($gameName == 'Mobile Legends') {
                $specialProducts = [
                    ['name' => 'Weekly Diamond Pass (WDP)', 'amount' => 1, 'price' => 28000, 'cat' => 'Membership'],
                    ['name' => 'Twilight Pass', 'amount' => 1, 'price' => 150000, 'cat' => 'Membership'],
                    ['name' => 'Starlight Member', 'amount' => 1, 'price' => 300000, 'cat' => 'Membership'],
                ];
            } elseif ($gameName == 'Free Fire') {
                $specialProducts = [
                    ['name' => 'Membership Mingguan', 'amount' => 1, 'price' => 30000, 'cat' => 'Membership'],
                    ['name' => 'Membership Bulanan', 'amount' => 1, 'price' => 150000, 'cat' => 'Membership'],
                ];
            } else {
                $specialProducts = [];
            }

           
            foreach ($specialProducts as $sp) {
                DB::table('products')->insert([
                    'game_id' => $gameId,
                    'category_id' => $categoryMap[$sp['cat']],
                    'name' => $sp['name'],
                    'amount' => $sp['amount'],
                    'price' => $sp['price'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

           
            $remaining = 10 - count($specialProducts);
            for ($i = 1; $i <= $remaining; $i++) {
                $diamondAmount = $i * 50;
                DB::table('products')->insert([
                    'game_id' => $gameId,
                    'category_id' => $categoryMap['Diamond'],
                    'name' => "$diamondAmount Diamonds",
                    'amount' => $diamondAmount,
                    'price' => $diamondAmount * 300,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
