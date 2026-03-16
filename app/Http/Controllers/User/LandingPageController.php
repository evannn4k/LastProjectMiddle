<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        $games = Game::where('is_active', true)->get();
        $user = Auth::guard("user")->check() ? User::find(Auth::guard("user")->user()->id) : null;

        return view('content.user.index', compact('games', 'memberships', 'user'));
    }

    public function detail($slug)
    {
        $game = Game::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $categories = Category::whereHas('product', function ($query) use ($game) {
            $query->where('game_id', $game->id);
        })->with(['product' => function ($query) use ($game) {
            $query->where('game_id', $game->id);
        }])->get();

        $discount = 0;

        if (Auth::guard("user")->check()) {
            $user = User::find(Auth::guard("user")->user()->id);
            if (Subscription::where('user_id', $user->id)->exists()) {
                $discount = $user->subscription->membership->discount;
            }
        }

        return view('content.user.detail', compact('game', 'categories', 'discount'));
    }
}
