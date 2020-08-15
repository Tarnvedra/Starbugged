<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AccountsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           // $user = Auth::findOrFail(user());
           $user = auth()->user();
            return view('admin/account')->with('user' , $user);
    }

    public function admin()
    {
            //$user = Auth::findOrFail(user());
           // dd($user);
            $user = auth()->user();
            $users = User::orderBy('username','asc')->paginate(11);
            $user_roles = Role::get();
            return view('admin/manageusers')->with('users', $users)->with('user', $user)->with('user_roles' , $user_roles);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $user = User::find($id);
    $roles = Role::all();
    return view('admin/edit')->with([
        'user' => $user,
        'roles' => $roles
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required',

            'useraccountlevel' => 'required',

        ]);
    $user_update = User::find($id);
    //$roles = Role::find($user->id);
    $user_update->username = $request->input('username');
    //$roles->roles = $request->input('roles');
    $user_update->useraccountlevel = $request->input('useraccountlevel');
    $user_update->save();
    $user = auth()->user();
    return view('admin/account')->with('success' , 'User succesfully updated')->with('user' , $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('home')->with('user' , $user);
    }
}
