<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;;

use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TransaksiController extends Controller
{
    public function exportExcel(): BinaryFileResponse
    {
        $mahasiswa = Mahasiswa::all();
        return Excel::download(new MahasiswaExport($mahasiswa), 'mahasiswa.xlsx');
    }

    public function exportPdf()
    {
        $mahasiswa = Mahasiswa::all();

        $pdf = PDF::loadView('exports.mahasiswa', ['mahasiswa' => $mahasiswa]);

        return $pdf->download('mahasiswa.pdf');
    }
}
