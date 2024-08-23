<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Auth;

class SawController extends Controller
{
    public function index()
    {
        $res = $this->hitungSiswaTerbaik();
        if(!$res){
            return redirect()->route('dashboard');
        }

        return view('admin.saw.index', compact('res'));
    }

    private function hitungSiswaTerbaik()
    {
        // Mendapatkan semua siswa beserta nilai dan pelajaran terkait
        $siswa = null;
        if(Auth::user()->kelas){
            $siswa = Siswa::where('id_kelas', Auth::user()->kelas->id)->with('nilai.pelajaran')->get();
        }
        if(!$siswa){
            session()->flash('kelas-warn', 'Hanya Wali kelas yang bisa mengakses data siswa terbaik');
            return null;
        }
        

        // Mendapatkan total nilai maksimal per pelajaran untuk normalisasi
        $maxNilaiPerPelajaran = [];
        foreach ($siswa as $data) {
            foreach ($data->nilai as $nilai) {
                $kodePelajaran = $nilai->kode_pelajaran;
                if (!isset($maxNilaiPerPelajaran[$kodePelajaran])) {
                    $maxNilaiPerPelajaran[$kodePelajaran] = $nilai->nilai;
                } else {
                    $maxNilaiPerPelajaran[$kodePelajaran] = max($maxNilaiPerPelajaran[$kodePelajaran], $nilai->nilai);
                }
            }
        }

        // Perhitungan SAW
        foreach ($siswa as $data) {
            $nilaiAkhir = 0;

            foreach ($data->nilai as $nilai) {
                $kodePelajaran = $nilai->kode_pelajaran;
                $pelajaran = $nilai->pelajaran; // Mengambil model Pelajaran terkait
                $bobot = $pelajaran->bobot;

                // Normalisasi dan kalikan dengan bobot
                $nilaiNormalisasi = $nilai->nilai / $maxNilaiPerPelajaran[$kodePelajaran];
                $nilaiAkhir += $nilaiNormalisasi * $bobot;
            }

            // Menyimpan hasil nilai akhir pada atribut tambahan
            $data->nilai_akhir = $nilaiAkhir;
        }

        // Mengurutkan siswa berdasarkan nilai akhir tertinggi dan mengambil 3 teratas
        $siswaTerbaik = $siswa->sortByDesc('nilai_akhir')->all();

        // Membuat array untuk menyimpan hasil siswa terbaik beserta nilai akhirnya
        return array('siswa_terbaik' => $siswaTerbaik);
    }
}
