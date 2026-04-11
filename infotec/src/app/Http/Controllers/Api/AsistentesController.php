<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asistentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsistentesController extends Controller
{
    public function index()
    {
        $asistentes = Asistentes::all();

        return response()->json([
            'asistentes' => $asistentes,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
             'evento_id' => 'required',

        
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $asistentes = Asistentes::create($request->all());

        return response()->json([
            'asistentes' => $asistentes,
            'status' => 201
        ], 201);
    }

    public function show(string $id)
    {
        $asistentes = Asistentes::find($id);

        if (!$asistentes) {
            return response()->json([
                'message' => 'asistentes no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'asistentes' => $asistentes,
            'status' => 200
        ]);
    }

    public function update(Request $request, string $id)
    {
        $asistentes = Asistentes::find($id);

        if (!$asistentes) {
            return response()->json([
                'message' => 'asistentes no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
             'evento_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $asistentes->update($request->all());

        return response()->json([
            'asistentes' => $asistentes,
            'status' => 200
        ]);
    }

    public function destroy(string $id)
    {
        $asistentes = Asistentes::find($id);

        if (!$asistentes) {
            return response()->json([
                'message' => 'asistentes no encontrado',
                'status' => 404
            ], 404);
        }

        $asistentes->delete();

        return response()->json([
            'message' => 'Asistentes eliminado',
            'status' => 200
        ]);
    }
}
