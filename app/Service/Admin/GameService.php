<?php

namespace App\Service\Admin;

class GameService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function updateStatus($game)
    {
        $game->is_active = !$game->is_active;
        $game->save();

        return $game;
    }
}
