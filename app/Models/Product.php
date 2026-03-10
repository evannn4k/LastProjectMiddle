<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Game;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
