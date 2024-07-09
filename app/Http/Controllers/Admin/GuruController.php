<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::all();

        return view('admin.guru.index', compact(['guru']));
    }

    public function add(){
        return view('admin.guru.add');
    }

    public function create(Request $req){
        $guruArr = Guru::all();
        foreach($guruArr as $g){
            if($g->NIP == $req->nip){
                session()->flash('nip-warn', 'NIP sudah terkait oleh ' . $g->NIP . " - " . $g->name);
                return redirect()->route('admin.guru.add');
            }
        }
        // return $req;
        $guru = new Guru;

        $guru->NIP = $req->nip;
        $guru->name = $req->name;
        $guru->email = $req->email;
        $guru->password = Hash::make($req->password);

        $guru->save();

        return redirect()->route('admin.guru.index');
    }

    public function edit($id){
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact(['guru', 'guru']));
    }

    public function update(Request $req){
        // return $req;
        $guru = Guru::findOrFail($req->id);
        if($req->id != $req->nip){
            $guruArr = Guru::all();
            foreach($guruArr as $g){
                if($g->NIP == $req->nip){
                    session()->flash('nip-warn', 'NIP sudah terkait oleh ' . $g->NIP . " - " . $g->name);
                    return redirect()->route('admin.guru.edit' , ['id' => $req->id]);
                }
            }
        }

        $guru->NIP = $req->nip;
        $guru->name = $req->name;
        $guru->email = $req->email;
        $guru->password = Hash::make($req->password);

        $guru->save();

        return redirect()->route('admin.guru.index');
    }

    public function delete($id){
        Guru::destroy($id);

        return redirect()->route('admin.guru.index');
    }
}
