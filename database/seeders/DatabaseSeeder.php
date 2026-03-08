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
        // --- 1. SEED USER (ADMIN & USER) ---
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

        
        // 1. Buat 5 Kategori (Semua priority = false)
        $categories = [
            ['name' => 'Diamond', 'default_image' => 'diamond.png', 'priority' => false],
            ['name' => 'Membership', 'default_image' => 'membership.png', 'priority' => false],
            ['name' => 'Voucher', 'default_image' => 'voucher.png', 'priority' => false],
            ['name' => 'Items', 'default_image' => 'items.png', 'priority' => false],
            ['name' => 'Points', 'default_image' => 'points.png', 'priority' => false],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $id = DB::table('categories')->insertGetId(array_merge($cat, [
                'created_at' => now(), 'updated_at' => now()
            ]));
            $categoryMap[$cat['name']] = $id;
        }

        // 2. Daftar 15 Game
        $games = [
            'Mobile Legends', 'Free Fire', 'Genshin Impact', 'PUBG Mobile', 'Valorant',
            'Roblox', 'Call of Duty Mobile', 'League of Legends', 'Minecraft', 'Apex Legends',
            'Clash of Clans', 'Steam Wallet', 'Honkai Star Rail', 'Point Blank', 'Honor of Kings'
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

            // Logika Produk Khusus MLBB dan Free Fire
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

            // Masukkan produk khusus jika ada
            foreach ($specialProducts as $sp) {
                DB::table('products')->insert([
                    'game_id' => $gameId,
                    'category_id' => $categoryMap[$sp['cat']],
                    'name' => $sp['name'],
                    'amount' => $sp['amount'],
                    'price' => $sp['price'],
                    'is_active' => true,
                    'created_at' => now(), 'updated_at' => now()
                ]);
            }

            // Sisanya buatkan Diamond (agar total tetap sekitar 10 produk per game)
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
                    'created_at' => now(), 'updated_at' => now()
                ]);
            }
        }
    }
}
