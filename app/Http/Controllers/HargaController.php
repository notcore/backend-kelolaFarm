<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        $harga = Harga::with(['tanaman', 'daerah'])->get();

        return response()->json([
            'message' => 'success',
            'data' => $harga
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'daerah_id' => 'required|exists:daerahs,id',
            'tanaman_id' => 'required|exists:tanamen,id',
            'harga' => 'required|string'
        ]);

        $harga = Harga::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $harga
        ], 201);
    }

    public function update(Request $request, Harga $harga)
    {
        $data = $request->validate([
            'daerah_id' => 'required|exists:daerahs,id',
            'tanaman_id' => 'required|exists:tanamen,id',
            'harga' => 'required|string'
        ]);

        $harga->update($data);

        return response()->json([
            'message' => 'updated',
            'data' => $harga
        ], 200);
    }

    public function destroy(Harga $harga)
    {
        $harga->delete();

        return response()->json([
            'message' => 'deleted'
        ], 200);
    }
}
