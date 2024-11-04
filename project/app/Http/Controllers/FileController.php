<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Exibe o formulário de upload.
     */
    public function showUploadForm()
    {
        return view('upload');
    }

    /**
     * Armazena o arquivo enviado na pasta 'public/uploads'.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Armazena o arquivo na pasta 'public/uploads' e retorna o caminho
        $path = $request->file('file')->store('uploads', 'public');

        // Salva o caminho no banco de dados
        $file = new File();
        $file->path = $path;
        $file->save();

        return response()->json(['path' => 'storage/' . $path, 'message' => 'Arquivo enviado com sucesso!']);
    }
}
