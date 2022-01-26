<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelurahanResource;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller
{
    public function index()
    {
        $data = Kelurahan::with('kecamatan')->latest()->get();
        return response()->json([KelurahanResource::collection($data), 'Data Kelurahan']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kecamatan' => 'required|max:20',
            'nama' => 'required|max:255'
        ]);

        $kelurahan = Kelurahan::create([
            'id_kecamatan' => $request->id_kecamatan,
            'nama' => $request->nama
        ]);

        return response()->json(['Kelurahan Sudah Dibuat!', new KelurahanResource($kelurahan)]);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::find($id);
        if (is_null($kelurahan)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new KelurahanResource($kelurahan)]);
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {

        $validator = Validator::make($request->all(), [
            'id_kecamatan' => 'required',
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->nama = $request->nama;
        $kelurahan->save();

        return response()->json(['Kelurahan berhasil diupdate.', new KelurahanResource($kelurahan)]);
    }

    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();

        return response()->json('Kelurahan sudah dihapus');
    }
}
