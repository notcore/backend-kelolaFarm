<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'success',
            'data' => Lahan::with(['tanah', 'daerah', 'tanaman'])->get()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
        'tanah_id' => 'required|exists:tanahs,id',
        'daerah_id' => 'required|exists:daerahs,id',
        'nama_lahan' => 'required|string',
        'hektar' => 'required|numeric',
        'gambar_lahan' => 'image',
        'lat' => 'nullable|numeric',
        'lon' => 'nullable|numeric',
        ]);

        if ($request->hasFile('gambar_lahan')) {
            $data['gambar_lahan'] = $request->file('gambar_lahan')
                ->store('lahan', 'public');
        }
       

        $lahan = Lahan::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $lahan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lahan $lahan)
    {
        return response()->json([
            'message' => 'success',
            'data' => $lahan->load(['tanah', 'daerah', 'tanaman'])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lahan $lahan)
    {
        $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'tanah_id' => 'required|exists:tanahs,id',
        'daerah_id' => 'required|exists:daerahs,id',
        'nama_lahan' => 'required|string',
        'hektar' => 'required|numeric',
        'gambar_lahan' => 'image',
        'lat' => 'nullable|numeric',
        'lon' => 'nullable|numeric',
        ]);

        if ($request->hasFile('gambar_lahan')) {
         
            if (
                $lahan->gambar_lahan &&
                $lahan->gambar_lahan !== 'lahan/default.jpg'
            ) {
                Storage::disk('public')->delete($lahan->gambar_lahan);
            }

            $data['gambar_lahan'] = $request->file('gambar_lahan')
                ->store('lahan', 'public');
        }

        $lahan->update($data);

        return response()->json([
            'message' => 'success',
            'data' => $lahan
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lahan $lahan)
    {
        if (
            $lahan->gambar_lahan &&
            $lahan->gambar_lahan !== 'lahan/default.jpg'
        ) {
            Storage::disk('public')->delete($lahan->gambar_lahan);
        }

        $lahan->delete();

        return response()->json([
            'message' => 'success delete'
        ], 200);
    }
}
