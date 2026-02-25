<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Game\GameStatusUpdateRequest;
use App\Models\Game;
use App\Service\Admin\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index()
    {
        $key = request()->get('s') ?? null;

        if ($key) {
            $games = Game::where('name', 'LIKE', '%'.$key.'%')->get();
        } else {
            $games = Game::all();
        }

        return view('content.admin.game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Game $game)
    {
        $game = $this->gameService->updateStatus($game);

        if($game) {
            return redirect()->route('admin.game.index')->with('success', 'Berhasil mengubah status game');
        } else {
            return redirect()->route('admin.game.index')->with('error', 'Gagal mengubah status game');
        }
    }
}
