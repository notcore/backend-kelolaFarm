<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TanamanController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Tanaman::with('tanah')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "tanah_id" => "required|exists:tanahs,id",
            "nama_tanaman" => "required|string|unique:tanamen,nama_tanaman",
            "gambar_tanaman" => "required|image"
        ]);

        $data["gambar_tanaman"] =
            $request->gambar_tanaman->store("tanaman", "public");

        $tanaman = Tanaman::create($data);

        return response()->json([
            "message" => "created",
            "data" => $tanaman
        ], 201);
    }

    public function show(Tanaman $tanaman)
    {
        $tanaman->load('tanah');

        return response()->json([
            "message" => "success",
            "data" => $tanaman
        ], 200);
    }

    public function update(Request $request, Tanaman $tanaman)
    {
        $data = $request->validate([
            "tanah_id" => "required|exists:tanahs,id",
            "nama_tanaman" =>
                "required|string|unique:tanamen,nama_tanaman," . $tanaman->id,
            "gambar_tanaman" => "nullable|image"
        ]);

        if ($request->hasFile("gambar_tanaman")) {
            if ($tanaman->gambar_tanaman) {
                Storage::disk("public")->delete($tanaman->gambar_tanaman);
            }

            $data["gambar_tanaman"] =
                $request->gambar_tanaman->store("tanaman", "public");
        }

        $tanaman->update($data);

        return response()->json([
            "message" => "updated",
            "data" => $tanaman
        ], 200);
    }

    public function destroy(Tanaman $tanaman)
    {
        if ($tanaman->gambar_tanaman) {
            Storage::disk("public")->delete($tanaman->gambar_tanaman);
        }

        $tanaman->delete();

        return response()->json([
            "message" => "deleted"
        ], 200);
    }
}
