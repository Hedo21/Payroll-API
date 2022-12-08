<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gaji = gaji::all();
        $gaji = gaji::with('gaji_karyawan')->get();
        $response = [
            'message' => 'Data gaji',
            'data'    => $gaji,
        ];
        if ($gaji) {
            return response()->json([
                'success' => true,
                $response,
                'message' => 'Data Berhasil Ditampilkan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                $response,
                'message' => 'Data Gagal Ditampilkan!',
            ], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_gaji'       => 'required|unique:gaji,id_gaji',
                'id_karyawan'   => 'required',
                'id_uang_makan' => 'required',
                'gaji_basic'    => 'required',
                'slip_gaji'     => 'required',
                'pensiun'       => 'required',
                'dana_lain'     => 'required',
            ],
            [
                'id_gaji.required'       => 'Masukkan Id Gaji',
                'id_karyawan.required'   => 'Masukkan Id Karyawan',
                'id_uang_makan.required' => 'Masukkan Id Uang Makan',
                'gaji_basic.required'    => 'Masukkan Gaji Basic',
                'slip_gaji.required'     => 'Masukkan SLip Gaji',
                'pensiun.required'       => 'Masukkan Pensiun',
                'dana_lain.required'     => 'Dana lain optional, jika tidak ada isi dengan angka nol (0)',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $gaji = gaji::create([
                'id_karyawan'   => $request->input('id_karyawan'),
                'id_gaji'       => $request->input('id_gaji'),
                'id_uang_makan' => $request->input('id_uang_makan'),
                'gaji_basic'    => $request->input('gaji_basic'),
                'slip_gaji'     => $request->input('slip_gaji'),
                'pensiun'       => $request->input('pensiun'),
                'dana_lain'     => $request->input('dana_lain'),
            ]);
            if ($gaji) {
                return response()->json([
                    'success' => true,
                    'id'      => $gaji->id,
                    'message' => 'Data Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 401);
            }
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show($id_gaji)
    {
        $gaji = gaji::with('gaji_karyawan')->where('id_gaji', '=', $id_gaji)->get();
        $response = [
            'message' => 'Data Gaji',
            'data'    => $gaji,
        ];
        if ($gaji) {
            return response()->json([
                'status'   => true,
                $response,
                'message'  => 'Gaji ditemukan'
            ], 200);
        } else {
            return response()->json([
                'status'   => false,
                $response,
                'message'  => 'Data Gaji tidak ada'
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_gaji)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_gaji'       => 'required',
                'id_karyawan'   => 'required',
                'id_uang_makan' => 'required',
                'gaji_basic'    => 'required',
                'slip_gaji'     => 'required',
                'pensiun'       => 'required',
                'dana_lain'     => 'required',
            ],
            [
                'id_gaji.required'       => 'Masukkan id gaji',
                'id_karyawan.required'   => 'Masukkan id Karyawan',
                'id_uang_makan.required' => 'Masukkan id uang makan',
                'gaji_basic.required'    => 'Masukkan gaji basic',
                'slip_gaji.required'     => 'Masukkan slip gaji',
                'pensiun.required'       => 'Masukkan pensiun',
                'dana_lain.required'     => 'Dana lain optional, jika tidak ada isi dengan angka nol (0)',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'gagal',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $gaji = gaji::where('id_gaji', $id_gaji);
            $gaji->update([
                'id_gaji'       => $request->id_gaji,
                'id_karyawan'   => $request->id_karyawan,
                'id_uang_makan' => $request->id_uang_makan,
                'gaji_basic'    => $request->gaji_basic,
                'slip_gaji'     => $request->slip_gaji,
                'pensiun'       => $request->pensiun,
                'dana_lain'     => $request->dana_lain,
            ]);
            return response()->json([
                'succes'  => true,
                'gaji'    => new gaji(),
                'message' => 'berhasil update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gaji)
    {
        gaji::where('id_gaji', $id_gaji)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Dihapus',
        ]);
    }
}
