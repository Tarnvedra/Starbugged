<?php

namespace App\Http\Controllers\Accounts;


use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function welcome () {
        return view('welcome');
    }
}
