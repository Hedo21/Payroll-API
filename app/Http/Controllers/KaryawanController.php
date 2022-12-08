<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = karyawan::all();
        $response = [
            'message' => 'Data karyawan',
            'data'    => $karyawan,
        ];
        if ($karyawan) {
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

    public function tampil()
    {
        return view('karyawan');
    }

    public function yajra()
    {
        $karyawans = karyawan::select(['id_karyawan', 'username', 'level_karyawan', 'nama', 'alamat', 'email', 'no_telpon', 'absensi']);
        return DataTables::of($karyawans)
            ->addColumn('action', function ($data) {
                $button = '<a href="javascript:void(0)" id="btn-update" data-id="' . $data->id . '" class="btn btn-success">Update</a>';
                $button .= '<a href="javascript:void(0)" id="btn-delete" data-id="' . $data->id . '" class="btn btn-danger">Delete</a>';
                return $button;
            })->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
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
                'username'       => 'required',
                'password'       => 'required',
                'level_karyawan' => 'required',
                'nama'           => 'required',
                'alamat'         => 'required',
                'email'          => 'required',
                'no_telpon'      => 'required',
                'absensi'        => 'required',
            ],
            [
                'username.required'       => 'Masukkan Usernam',
                'password.required'       => 'Masukkan Password',
                'level_karyawan.required' => 'Masukkan Level Karyawan',
                'nama.required'           => 'Masukkan Nama',
                'alamat.required'         => 'Masukkan Alamat',
                'email.required'          => 'Masukkan Email',
                'no_telpon.required'      => 'Masukkan No Telpon',
                'absensi.required'        => 'Masukkan Absensi',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $karyawan = karyawan::create([
                'username'       => $request->input('username'),
                'password'       => $request->input('password'),
                'level_karyawan' => $request->input('level_karyawan'),
                'nama'           => $request->input('nama'),
                'alamat'         => $request->input('alamat'),
                'email'          => $request->input('email'),
                'no_telpon'      => $request->input('no_telpon'),
                'absensi'        => $request->input('absensi'),
            ]);
            if ($karyawan) {
                return response()->json([
                    'success' => true,
                    'id'      => $karyawan->id,
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
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = karyawan::where('id_karyawan', '=', $id)->first();
        $response = [
            'message' => 'Data Karyawan',
            'data'    => $karyawan,
        ];
        if ($karyawan) {
            return response()->json([
                'status' => true,
                $response,
                'message' => 'Berhasil Ditemukan'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                $response,
                'message' => 'Data Tidak Ada',
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_karyawan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_karyawan'    => 'required',
                'username'       => 'required',
                'password'       => 'required',
                'level_karyawan' => 'required',
                'nama'           => 'required',
                'alamat'         => 'required',
                'email'          => 'required',
                'no_telpon'      => 'required',
                'absensi'        => 'required',
            ],
            [
                'id_karyawan.required'    => 'Masukkan id Karyawan',
                'username.required'       => 'Masukkan Username',
                'password.required'       => 'Masukkan Password',
                'level_karyawan.required' => 'Masukkan Level Karyawan',
                'nama.required'           => 'Masukkan Nama',
                'alamat.required'         => 'Masukkan Alamat',
                'email.required'          => 'Masukkan Email',
                'no_telpon.required'      => 'Masukkan No Telpon',
                'absensi.required'        => 'Masukkan Absensi',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'gagal',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $karyawan = karyawan::where('id_karyawan', $id_karyawan);
            $karyawan->update([
                'id_karyawan'    => $request->id_karyawan,
                'username'       => $request->username,
                'password'       => $request->password,
                'level_karyawan' => $request->level_karyawan,
                'nama'           => $request->nama,
                'alamat'         => $request->alamat,
                'email'          => $request->email,
                'no_telpon'      => $request->no_telpon,
                'absensi'        => $request->absensi,
            ]);
            return response()->json([
                'succes'   => true,
                'karyawan' => new karyawan(),
                'message'  => 'berhasil update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_karyawan)
    {
        karyawan::where('id_karyawan', $id_karyawan)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Dihapus',
        ]);
    }
}
