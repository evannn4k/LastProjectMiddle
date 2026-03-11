<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Game\GameCreateRequest;
use App\Http\Requests\Admin\Game\GameStatusUpdateRequest;
use App\Http\Requests\Admin\Game\GameUpdateRequest;
use App\Models\Category;
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
        $games = Game::all();

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
    public function store(GameCreateRequest $request)
    {
        $game = $this->gameService->createGame($request->validated());

        if ($game) {
            return redirect()->back()->with('success', 'Berhasil menambah data game');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data game');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::all();
        $game = Game::with(["product", "product.category"])->findOrFail($id);
        
        return view("content.admin.game.detail", compact("game", "categories"));
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
    public function update(GameUpdateRequest $request, Game $game)
    {
        $game = $this->gameService->updateGame($game, $request->validated());
        
        if ($game) {
            return redirect()->back()->with('success', 'Berhasil mengubah data game');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data game');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game = $this->gameService->deleteGame($game);

        if ($game) {
            return redirect()->back()->with('success', 'Berhasil menghapus data game');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data game');
        }
    }

    public function status(Game $game)
    {
        $game = $this->gameService->updateStatus($game);

        if ($game) {
            return redirect()->route("admin.game.index")->with('success', 'Berhasil mengubah status game');
        } else {
            return redirect()->route("admin.game.index")->with('error', 'Gagal mengubah status game');
        }
    }
}
