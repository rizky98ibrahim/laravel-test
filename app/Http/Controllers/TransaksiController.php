<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{

    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::paginate($request->input('limit', 10));

        // Mengubah jenis_kelamin menjadi "Laki-Laki" atau "Perempuan"
        $mahasiswa->transform(function ($item) {
            $item->jenis_kelamin = $item->jenis_kelamin ? 'Laki-Laki' : 'Perempuan';
            return $item;
        });

        // Menghubungkan model Jurusan
        $mahasiswa->load('jurusan');

        return response()->json([
            'success' => true,
            'message' => 'Daftar data mahasiswa',
            'data' => $mahasiswa
        ], 200);
    }


    public function exportExcel(Request $request)
    {
        $limit = $request->query('limit', null);
        $mahasiswa = Mahasiswa::paginate($limit ?? $request->input('limit', 5))->items();
        $mahasiswaCollection = new Collection($mahasiswa); // Convert array to collection
        return Excel::download(new MahasiswaExport($mahasiswaCollection), 'mahasiswa.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $limit = $request->query('limit', null);
        $mahasiswa = Mahasiswa::paginate($limit ?? $request->input('limit', 5))->items();
        $mahasiswaCollection = new Collection($mahasiswa); // Convert array to collection
        $pdf = PDF::loadView('exports.mahasiswa', ['mahasiswa' => $mahasiswaCollection]);
        return $pdf->download('mahasiswa.pdf');
    }
}
