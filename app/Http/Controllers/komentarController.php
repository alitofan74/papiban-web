<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class komentarController extends Controller
{
    //

    public function index(){
        return view("mimin.komentar.index");
    }
}
