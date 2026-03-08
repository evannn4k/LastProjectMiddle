<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;

class LandingPageController extends Controller
{
    public function index()
    {
        $games = Game::where('is_active', true)->get();

        return view('content.user.index', compact('games'));
    }

    public function detail($slug)
    {
        $game = Game::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $categories = Category::whereHas('product', function ($query) use ($game) {
            $query->where('game_id', $game->id);
        })->with(['product' => function ($query) use ($game) {
            $query->where('game_id', $game->id);
        }])->get();

        return view('content.user.detail', compact('game', 'categories'));
    }
}
