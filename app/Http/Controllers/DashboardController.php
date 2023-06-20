<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataMahasiswa = Jurusan::withCount(['mahasiswa as total_laki_laki' => function ($query) {
            $query->where('jenis_kelamin', true);
        }])->withCount(['mahasiswa as total_perempuan' => function ($query) {
            $query->where('jenis_kelamin', false);
        }])->get();

        return view('dashboard', compact('dataMahasiswa'));
    }
}
