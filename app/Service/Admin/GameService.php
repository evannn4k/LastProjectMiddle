<?php

namespace App\Service\Admin;

use App\Action\GenerateSlugAction;
use App\Action\SaveImageAction;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class GameService
{
    /**
     * Create a new class instance.
     */
    protected $saveImageAction;
    protected $generateSlugAction;
    protected $path = "images/game/";

    public function __construct(SaveImageAction $saveImageAction, GenerateSlugAction $generateSlugAction)
    {
        $this->saveImageAction = $saveImageAction;
        $this->generateSlugAction = $generateSlugAction;
    }

    public function createGame($data)
    {
        $slug = $this->generateSlugAction->generate($data["name"], Game::class);
        $filename = $this->saveImageAction->save($data["image"], $this->path);

        $data["slug"] = $slug;
        $data["image"] = $filename;

        $game = Game::create($data);
        return $game;
    }

    public function updateGame($game, $data)
    {
        // cek gambar        
        if (isset($data["image"])) {
            $filename = $this->saveImageAction->save($data["image"], $this->path, $game->image);
            $data["image"] = $filename;
        }

        $slug = $this->generateSlugAction->generate($data["name"], Game::class, $game['id']);
        $data["slug"] = $slug;

        $game->update($data);
        return $game;
    }

    public function deleteGame($game)
    {
        Storage::delete($this->path . $game->image);

        $game->delete();

        return $game;
    }

    public function updateStatus($game)
    {
        $game->is_active = !$game->is_active;
        $game->save();

        return $game;
    }
}
