<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use Pass;

class NilaiController extends Controller
{
    public function index(){
        $nilai = Nilai::all();

        return view('admin.nilai.index', compact(['nilai']));
    }

    public function add(){
        $pelajaran = Pelajaran::all();
        $siswa = Siswa::all();
        $pass = Pass::get_pass();

        return view('admin.nilai.add', compact(['pelajaran', 'siswa', 'pass']));
    }

    public function create(Request $req) {    
        // return $req;
        $nilai = new Nilai;
    
        $nilai->kode_pelajaran = $req->kode_pelajaran;
        $nilai->NIS = $req->NIS;
        $nilai->nilai = $req->nilai;
    
        $nilai->save();
    
        return redirect()->route('admin.nilai.index');
    }        

    public function edit($id){
        $pelajaran = Pelajaran::all();
        $siswa = Siswa::all();
        $nilai = Nilai::findOrFail($id);
        $pass = Pass::get_pass();

        return view('admin.nilai.edit', compact(['pelajaran', 'siswa', 'nilai', 'pass']));
    }

    public function update(Request $req){
        $nilai = Nilai::findOrFail($req->id);

        $nilai->kode_pelajaran = $req->kode_pelajaran;
        $nilai->NIS = $req->NIS;
        $nilai->nilai = $req->nilai;

        $nilai->save();

        return redirect()->route('admin.nilai.index');
    }

    public function delete($id){
        Nilai::destroy($id);

        return redirect()->route('admin.nilai.index');
    }
}
