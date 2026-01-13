<?php

namespace App\Http\Controllers;

use App\Models\Tanah;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanah = Tanah::all();

        return Response()->json([
            "jenis_tanah" => $tanah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "jenis_tanah" => 'string|unique:tanahs,jenis_tanah|required'
        ]);

        $jenis_tanah = Tanah::create([
            "jenis_tanah" => $request->jenis_tanah
        ]);

        return response()->json([
            "message" => "sucess",
            "data" => $jenis_tanah
        ], 201);
    }

    public function show(Tanah $tanah)
    {
        return response()->json([
            "message" => "detail tanah",
            "data" => $tanah
        ]);
    }

    public function update(Request $request, Tanah $tanah)
    {
        $validasi = $request->validate([
            "jenis_tanah" => 
                "string",
                "required",
    
        ]);

        $tanah->update($request->only("jenis_tanah"));

        return response()->json([
            "message" => "success",
            "data" => $tanah 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanah $tanah)
    {
        $tanah->delete();

        return response()->json([
            "message" => "berhasil menghapus jenis tanah"
        ], 200);
    }
}
