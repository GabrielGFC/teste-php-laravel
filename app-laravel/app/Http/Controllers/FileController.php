<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    public function index(Request $request)
    {
        // Verifica se um user_id foi fornecido na query string
        if ($request->has('user_id')) {
            $uploads = File::where('user_id', $request->query('user_id'))->get();

            if ($uploads->isEmpty()) {
                return response()->json([
                    "status" => 404,
                    "message" => "Nenhum upload encontrado para este usuário"
                ], 404);
            }

            return response()->json([
                "status" => 200,
                "message" => "Lista de uploads do usuário",
                "data" => $uploads
            ]);
        }

        // Se nenhum user_id foi fornecido, retorna todos os uploads
        $uploads = File::all();

        return response()->json([
            "status" => 200,
            "message" => "Lista de todos os uploads",
            "data" => $uploads
        ]);
    }

    public function upload(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:pdf|max:2048',
            ]);

            $path = $request->file('file')->store('documents', 'public');
            $url = Storage::url($path);

            $upload = File::create([
                'user_id' => auth()->id(),
                'file_path' => $path,
            ]);

            return response()->json([
                "status" => 200,
                "message" => "Arquivo enviado com sucesso!",
                "url" => $url,
                "upload_id" => $upload->id
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                "status" => 422,
                "message" => "Arquivo inválido. Apenas arquivos PDF de até 2 MB são permitidos.",
                "errors" => $e->errors()
            ], 422);
        }
    }
}
