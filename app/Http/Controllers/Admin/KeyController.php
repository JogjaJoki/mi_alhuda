<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index(){
        return view('admin.key');
    }

    public function blowfish(){
        return view('admin.blowfish');
    }

    public function vigenere(){
        return view('admin.vigenere');
    }

    public function vigblow(){
        return view('admin.vigblow');
    }
}
