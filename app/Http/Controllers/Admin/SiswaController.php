<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use Auth;

class SiswaController extends Controller
{
    public function index(){
        $role = Auth::user()->roles->pluck('name')[0];
        $siswa = null;
        if($role == 'admin'){
            $siswa = Siswa::all();
        }else{
            if(Auth::user()->kelas){
                $siswa = Siswa::where('id_kelas', Auth::user()->kelas->id)->get();
            }
        }
        if(!$siswa){
            session()->flash('kelas-warn', 'Hanya Wali kelas yang bisa mengakses data siswa ');
            return redirect()->route('dashboard');
        }

        return view('admin.siswa.index', compact(['siswa']));
    }

    public function add(){
        $kelas = Kelas::all();

        return view('admin.siswa.add', compact(['kelas']));
    }

    public function create(Request $req){
        $siswaArr = Siswa::all();
        foreach($siswaArr as $g){
            if($g->NIS == $req->nis){
                session()->flash('nis-warn', 'NIS sudah terkait oleh ' . $g->NIS . " - " . $g->nama);
                return redirect()->route('admin.siswa.add');
            }
        }
        $siswa = new Siswa;

        $siswa->NIS = $req->nis;
        $siswa->id_kelas = $req->kelas;
        $siswa->nama = $req->nama;
        $siswa->gender = $req->gender;
        $siswa->tempat_lahir = $req->tempat_lahir;
        $siswa->tanggal_lahir = $req->tanggal_lahir;
        $siswa->alamat = $req->alamat;

        $siswa->save();

        return redirect()->route('admin.siswa.index');
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('admin.siswa.edit', compact(['siswa', 'kelas']));
    }

    public function update(Request $req){
        $siswa = Siswa::findOrFail($req->id);
        if($req->id != $req->nis){
            $siswaArr = Siswa::all();
            foreach($siswaArr as $g){
                if($g->NIS == $req->nis){
                    session()->flash('nis-warn', 'NIS sudah terkait oleh ' . $g->NIP . " - " . $g->name);
                    return redirect()->route('admin.siswa.edit' , ['id' => $req->id]);
                }
            }
        }

        $siswa->NIS = $req->nis;
        $siswa->id_kelas = $req->kelas;
        $siswa->nama = $req->nama;
        $siswa->gender = $req->gender;
        $siswa->tempat_lahir = $req->tempat_lahir;
        $siswa->tanggal_lahir = $req->tanggal_lahir;
        $siswa->alamat = $req->alamat;

        $siswa->save();

        return redirect()->route('admin.siswa.index');
    }

    public function delete($id){
        Siswa::destroy($id);

        return redirect()->route('admin.siswa.index');
    }
}
