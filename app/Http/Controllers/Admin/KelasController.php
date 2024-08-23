<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;

class KelasController extends Controller
{
    public function index(){
        $kelas = Kelas::all();

        return view('admin.kelas.index', compact(['kelas']));
    }

    public function add(){
        $guru = User::role('guru')->get();

        return view('admin.kelas.add', compact(['guru']));
    }

    public function create(Request $req){
        $kelas = new Kelas;

        $kelas->nama_kelas = $req->nama_kelas;
        $kelas->user_id = $req->wali_kelas;

        $kelas->save();

        return redirect()->route('admin.kelas.index');
    }

    public function edit($id){
        $guru = User::role('guru')->get();
        $kelas = Kelas::findOrFail($id);

        return view('admin.kelas.edit', compact(['kelas', 'guru']));
    }

    public function update(Request $req){
        $kelas = Kelas::findOrFail($req->id);

        $kelas->nama_kelas = $req->nama_kelas;
        $kelas->user_id = $req->wali_kelas;

        $kelas->save();

        return redirect()->route('admin.kelas.index');
    }

    public function delete($id){
        Kelas::destroy($id);

        return redirect()->route('admin.kelas.index');
    }
}
