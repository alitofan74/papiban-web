<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memberController extends Controller
{
    //

    public function index(){
        return view("mimin.member.index");
    }
}
