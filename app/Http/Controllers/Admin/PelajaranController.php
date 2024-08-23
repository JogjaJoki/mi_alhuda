<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelajaran;

class PelajaranController extends Controller
{
    public function index(){
        $pelajaran = Pelajaran::all();

        return view('admin.pelajaran.index', compact(['pelajaran']));
    }

    public function add(){
        return view('admin.pelajaran.add');
    }

    public function create(Request $req) {
        $prefix = "MPL0";
        
        // Mengambil semua data mata pelajaran
        $allPelajaran = Pelajaran::all();
        
        // Mendapatkan nomor urut terakhir
        $lastNumber = 0;
    
        foreach ($allPelajaran as $pelajaran) {
            $number = intval(substr($pelajaran->kode_pelajaran, strlen($prefix)));
            $lastNumber = max($lastNumber, $number);
        }
    
        // Menentukan nomor urut berikutnya
        $nextNumber = $lastNumber + 1;
        
        // Membuat kode dengan nomor urut baru
        $kode = $prefix . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);
    
        $pelajaran = new Pelajaran;
    
        $pelajaran->kode_pelajaran = $kode;
        $pelajaran->nama = $req->nama;
        $pelajaran->bobot = $req->bobot;
    
        $pelajaran->save();
    
        return redirect()->route('admin.pelajaran.index');
    }        

    public function edit($id){
        $pelajaran = Pelajaran::findOrFail($id);

        return view('admin.pelajaran.edit', compact(['pelajaran']));
    }

    public function update(Request $req){
        $pelajaran = Pelajaran::findOrFail($req->kode_pelajaran);

        $pelajaran->nama = $req->nama;
        $pelajaran->bobot = $req->bobot;

        $pelajaran->save();

        return redirect()->route('admin.pelajaran.index');
    }

    public function delete($id){
        Pelajaran::destroy($id);

        return redirect()->route('admin.pelajaran.index');
    }
}
