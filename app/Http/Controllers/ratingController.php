<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ratingController extends Controller
{
    //

    public function index(){
        return view("mimin.rating.index");
    }
}
