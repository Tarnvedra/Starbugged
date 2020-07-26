<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function issues()
    {
        return view('issues');
    }

    public function account()
    {
        return view('account');
    }
}
