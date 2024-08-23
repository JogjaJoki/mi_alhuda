<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Pelajaran;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $guru = User::role('guru')->get();
        $siswa = Siswa::all();
        $pelajaran = Pelajaran::all();
        $kelas = Kelas::all();

        return view('admin.index', compact(['guru', 'kelas', 'siswa', 'pelajaran']));
    }
}
