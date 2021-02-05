<?php

namespace App\Http\Controllers\Accounts;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function welcome () {
        return view('welcome');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

}
