<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return Game::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'link' => 'required|url',
        ]);
        
        return Game::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Game::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());
        return response()->json([
            'message' => 'Jogo Editado com sucesso',
            'data' => $game
        ], 200);
    }

    public function destroy($id)
    {
        $games = Game::findOrFail($id); // Verifica se existe

        $games->delete(); // Exclui o item

        return response()->json([
            'message' => 'Jogo excluído com sucesso!',
            'data' => $games
        ], 200);
    }
}
