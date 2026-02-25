<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // --- 2. SEED CATEGORIES ---
        $categories = [
            ['name' => 'Diamond', 'default_image' => 'category/diamond.png'],
            ['name' => 'Membership', 'default_image' => 'category/membership.png'],
            ['name' => 'Skin', 'default_image' => 'category/skin.png'],
            ['name' => 'Voucher', 'default_image' => 'category/voucher.png'],
            ['name' => 'Point', 'default_image' => 'category/point.png'],
        ];

        $catIds = [];
        foreach ($categories as $cat) {
            $catIds[] = DB::table('categories')->insertGetId(array_merge($cat, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // --- 3. SEED GAMES ---
        $games = [
            ['name' => 'Mobile Legends', 'slug' => 'mobile-legends', 'publisher' => 'Moonton', 'img' => 'game/ml.png'],
            ['name' => 'Free Fire', 'slug' => 'free-fire', 'publisher' => 'Garena', 'img' => 'game/ff.png'],
            ['name' => 'Genshin Impact', 'slug' => 'genshin-impact', 'publisher' => 'Hoyoverse', 'img' => 'game/gi.png'],
            ['name' => 'Valorant', 'slug' => 'valorant', 'publisher' => 'Riot Games', 'img' => 'game/val.png'],
            ['name' => 'PUBG Mobile', 'slug' => 'pubg-mobile', 'publisher' => 'Tencent', 'img' => 'game/pubg.png'],
        ];

        $gameIds = [];
        foreach ($games as $g) {
            $gameIds[] = DB::table('games')->insertGetId([
                'name' => $g['name'],
                'slug' => $g['slug'],
                'region' => 'Indonesia',
                'publisher' => $g['publisher'],
                'is_active' => true,
                'description' => 'Top up '.$g['name'].' resmi dan murah.',
                'image' => $g['img'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --- 4. SEED PRODUCTS (10 PRODUK) ---
        $products = [
            // MLBB
            [
                'game_id' => $gameIds[0],
                'category_id' => $catIds[0], // Diamond
                'name' => '86 Diamonds',
                'amount' => 86,
                'price' => 21000,
                'image' => null, // Pakai gambar default kategori
            ],
            [
                'game_id' => $gameIds[0],
                'category_id' => $catIds[1], // Membership
                'name' => 'Weekly Diamond Pass',
                'amount' => 1,
                'price' => 29000,
                'image' => null,
            ],
            [
                'game_id' => $gameIds[0],
                'category_id' => $catIds[2], // Skin
                'name' => 'Skin Gusion Venom',
                'amount' => 1,
                'price' => 150000,
                'image' => 'prod/gusion.png', // Gambar spesifik
            ],

            // Free Fire
            [
                'game_id' => $gameIds[1],
                'category_id' => $catIds[0],
                'name' => '140 Diamonds',
                'amount' => 140,
                'price' => 20000,
                'image' => null,
            ],
            [
                'game_id' => $gameIds[1],
                'category_id' => $catIds[1],
                'name' => 'Membership Mingguan',
                'amount' => 1,
                'price' => 33000,
                'image' => null,
            ],

            // Genshin
            [
                'game_id' => $gameIds[2],
                'category_id' => $catIds[4], // Point/Crystal
                'name' => '60 Genesis Crystal',
                'amount' => 60,
                'price' => 16500,
                'image' => null,
            ],

            // Valorant
            [
                'game_id' => $gameIds[3],
                'category_id' => $catIds[4],
                'name' => '625 Valorant Points',
                'amount' => 625,
                'price' => 65000,
                'image' => null,
            ],

            // PUBG
            [
                'game_id' => $gameIds[4],
                'category_id' => $catIds[0],
                'name' => '60 UC',
                'amount' => 60,
                'price' => 14500,
                'image' => null,
            ],
            [
                'game_id' => $gameIds[4],
                'category_id' => $catIds[3], // Voucher
                'name' => 'Royale Pass Pack',
                'amount' => 1,
                'price' => 150000,
                'image' => null,
            ],

            // Bonus MLBB lagi
            [
                'game_id' => $gameIds[0],
                'category_id' => $catIds[0],
                'name' => '172 Diamonds',
                'amount' => 172,
                'price' => 42000,
                'image' => null,
            ],
        ];

        foreach ($products as $p) {
            DB::table('products')->insert(array_merge($p, [
                'stock' => 999,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
