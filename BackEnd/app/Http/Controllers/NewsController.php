<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return News::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        return News::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return News::findOrFail($id);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return $news;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id); // Verifica se existe

        $news->delete(); // Exclui o item

        return response()->json([
            'message' => 'Notícia excluída com sucesso!',
            'data' => $news
        ], 200);
    }
}
