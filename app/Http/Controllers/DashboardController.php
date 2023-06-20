<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $dataMahasiswa = Jurusan::withCount(['mahasiswa as total_laki_laki' => function ($query) {
                $query->where('jenis_kelamin', true);
            }])->withCount(['mahasiswa as total_perempuan' => function ($query) {
                $query->where('jenis_kelamin', false);
            }])->get();

            return response()->json([
                'success' => true,
                'message' => 'Data Dashboard Berhasil Diambil',
                'data' => $dataMahasiswa
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Dashboard Gagal Diambil',
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
