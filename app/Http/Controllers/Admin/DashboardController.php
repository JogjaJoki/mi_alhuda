<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $guru = Guru::all();
        $siswa = Siswa::all();
        $pelajaran = Pelajaran::all();
        $kelas = Kelas::all();

        return view('admin.index', compact(['guru', 'kelas', 'siswa', 'pelajaran']));
    }
}
