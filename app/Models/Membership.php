<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $guarded = [];

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
}
