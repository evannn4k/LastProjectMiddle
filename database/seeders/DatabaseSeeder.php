<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'phone' => '081234567890',
        ]);

        // 1. Buat Kategori Utama
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Mobile Games',
            'slug' => 'mobile-games',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Data Game
        $games = [
            ['name' => 'Mobile Legends', 'publisher' => 'Moonton', 'region' => 'Global'],
            ['name' => 'Free Fire', 'publisher' => 'Garena', 'region' => 'Global'],
            ['name' => 'PUBG Mobile', 'publisher' => 'Tencent', 'region' => 'Global'],
            ['name' => 'Genshin Impact', 'publisher' => 'HoYoverse', 'region' => 'Global'],
            ['name' => 'Honor of Kings', 'publisher' => 'Level Infinite', 'region' => 'Global'],
        ];

        // 3. Pilihan Jumlah Diamond (untuk variasi 10 produk per game)
        $diamondAmounts = [5, 12, 28, 50, 150, 250, 500, 1000, 1500, 2500];

        foreach ($games as $gameData) {
            // Simpan Game
            $gameId = DB::table('games')->insertGetId([
                'category_id' => $categoryId,
                'name' => $gameData['name'],
                'slug' => Str::slug($gameData['name']),
                'region' => $gameData['region'],
                'publisher' => $gameData['publisher'],
                'description' => "Top up diamond " . $gameData['name'] . " murah dan cepat.",
                'image' => Str::slug($gameData['name']) . ".png",
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 4. Buat 10 Produk Diamond per Game
            foreach ($diamondAmounts as $index => $amount) {
                DB::table('products')->insert([
                    'game_id' => $gameId,
                    'name' => $amount,
                    'type' => 'diamond',
                    'amount' => $amount,
                    'price' => $amount * 300, // Contoh harga: 300 per diamond
                    'stock' => 999,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
