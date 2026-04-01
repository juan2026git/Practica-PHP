<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json([
            'events' => $events,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'ubicacion' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $event = Event::create($request->all());

        return response()->json([
            'event' => $event,
            'status' => 201
        ], 201);
    }

    public function show(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Evento no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'event' => $event,
            'status' => 200
        ]);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Evento no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'ubicacion' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400
            ], 400);
        }

        $event->update($request->all());

        return response()->json([
            'event' => $event,
            'status' => 200
        ]);
    }

    public function destroy(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'message' => 'Evento no encontrado',
                'status' => 404
            ], 404);
        }

        $event->delete();

        return response()->json([
            'message' => 'Evento eliminado',
            'status' => 200
        ]);
    }
}