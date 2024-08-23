<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use File;

class GuruController extends Controller
{
    public function index(){
        $guru = User::role('guru')->get();

        return view('admin.guru.index', compact(['guru']));
    }

    public function add(){
        return view('admin.guru.add');
    }

    public function create(Request $req){
        $guruArr = User::all();
        foreach($guruArr as $g){
            if($g->detail){
                if($g->detail->NIP == $req->nip){
                    session()->flash('nip-warn', 'NIP sudah terkait oleh ' . $g->detail->NIP . " - " . $g->name);
                    return redirect()->route('admin.guru.add');
                }
            }            
        }
        // return $req;
        $guru = new User;
        $guru->name = $req->name;
        $guru->email = $req->email;
        $guru->password = Hash::make($req->password);

        $guru->save();
    
        $guru->assignRole('guru');

        $detail = new UserDetail;

        if($req->file('photo')){
            $validatedData = $req->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $foto = $req->file('photo')->getClientOriginalName();
            $path = $req->file('photo')->move('image/photo-guru/' , $foto);
            $detail->photo = $foto;
        }
        $detail->user_id = $guru->id;
        $detail->NIP = $req->nip;
        $detail->address = $req->address;
        $detail->phone = $req->phone;

        $detail->save();

        return redirect()->route('admin.guru.index');
    }

    public function edit($id){
        $guru = User::findOrFail($id);

        return view('admin.guru.edit', compact(['guru', 'guru']));
    }

    public function update(Request $req){
        // return $req;
        $guru = User::findOrFail($req->id);
        if($req->id != $req->nip){
            $guruArr = User::all();
            foreach($guruArr as $g){
                if($g->detail){
                    if($g->detail->NIP == $req->nip){
                        if($g->id == $req->id){
                            continue;
                        }
                        session()->flash('nip-warn', 'NIP sudah terkait oleh ' . $g->detail->NIP . " - " . $g->name);
                        return redirect()->route('admin.guru.edit' , ['id' => $req->id]);
                    }
                }
            }
        }
        $guru->name = $req->name;
        $guru->email = $req->email;
        if($req->password){
            $guru->password = Hash::make($req->password);
        }        

        $guru->save();

        $detail = UserDetail::where('user_id', $guru->id)->first();

        if(!$detail){
            $detail = new UserDetail;
            $detail->user_id = $guru->id;
        }
        $detail->NIP = $req->nip;
        $detail->address = $req->address;
        $detail->phone = $req->phone;

        if($req->file('photo')){
            if(File::exists('image/photo-guru/' . $detail->photo)) {
                File::delete('image/photo-guru/' . $detail->photo);
            }

            $validatedData = $req->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $foto = $req->file('photo')->getClientOriginalName();
            $path = $req->file('photo')->move('image/photo-guru/' , $foto);
            $detail->photo = $foto;
        }

        $detail->save();

        return redirect()->route('admin.guru.index');
    }

    public function delete($id){
        $guru = User::findOrFail($id);        
        if(File::exists('image/photo-guru/' . $guru->detail->photo)) {
            File::delete('image/photo-guru/' . $guru->detail->photo);
        }
        User::destroy($id);

        return redirect()->route('admin.guru.index');
    }
}
