<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ponentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ponentesController extends Controller
{

public function index()
    {
        $ponentes = Ponentes::all();

        return response()->json([
            'ponentes' => $ponentes,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $ponentes = Ponentes::create($request->all());

        return response()->json([
            'ponentes' => $ponentes,
            'status' => 201
        ], 201);
    }

    public function show(string $id)
    {
        $ponentes = Ponentes::find($id);

        if (!$ponentes) {
            return response()->json([
                'message' => 'Ponentes no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'ponentes' => $ponentes,
            'status' => 200
        ]);
    }

    public function update(Request $request, string $id)
    {
        $ponentes = Ponentes::find($id);

        if (!$ponentes) {
            return response()->json([
                'message' => 'Ponentes no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $ponentes->update($request->all());

        return response()->json([
            'ponentes' => $ponentes,
            'status' => 200
        ]);
    }

    public function destroy(string $id)
    {
        $ponentes = Ponentes::find($id);

        if (!$ponentes) {
            return response()->json([
                'message' => 'Ponentes no encontrado',
                'status' => 404
            ], 404);
        }

        $ponentes->delete();

        return response()->json([
            'message' => 'Ponentes eliminado',
            'status' => 200
        ]);
    }

}
