<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Daerah::with('tanah')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "tanah_id" => "required|exists:tanahs,id",
            "nama_Daerah" => "required|string|unique:tanamen,nama_Daerah",
        ]);

        $Daerah = Daerah::create($data);

        return response()->json([
            "message" => "created",
            "data" => $Daerah
        ], 201);
    }

    public function show(Daerah $Daerah)
    {
        $Daerah->load('tanah');

        return response()->json([
            "message" => "success",
            "data" => $Daerah
        ], 200);
    }

    public function update(Request $request, Daerah $Daerah)
    {
        $data = $request->validate([
            "tanah_id" => "required|exists:tanahs,id",
            "nama_Daerah" =>
                "required|string|unique:tanamen,nama_daerah," . $Daerah->id,
        ]);

        $Daerah->update($data);

        return response()->json([
            "message" => "updated",
            "data" => $Daerah
        ], 200);
    }

    public function destroy(Daerah $Daerah)
    {

        $Daerah->delete();

        return response()->json([
            "message" => "deleted"
        ], 200);
    }
}
