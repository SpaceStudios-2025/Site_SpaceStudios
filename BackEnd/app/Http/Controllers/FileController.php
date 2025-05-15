<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        // Laravel - FileController.php
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();

            $filePath = $file->storeAs('/uploads', $originalName);

            $url = Storage::url($filePath); // Garante a URL pública

            return response()->json([
                'success' => true,
                'message' => 'Arquivo enviado com sucesso!',
                'file_url' => $url // URL da imagem
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro no upload do arquivo.'
        ], 400);

    }
}
