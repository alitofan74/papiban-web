<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memberController extends Controller
{
    //

    public function index(){
        $b = call_fb('get', 'users', null);
        $data['data'] = $b;
        return view("mimin.member.index", $data);
    }
}
