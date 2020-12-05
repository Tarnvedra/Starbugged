<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Project;
use App\Issue;

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

    $user = auth()->user();
    $editeduser = User::find($id);
    $roles = Role::all();
    return view('admin/edit')->with([
        'editeduser' => $editeduser,
        'roles' => $roles
    ])->with('user' , $user);
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
    return redirect()->action('AccountsController@admin');

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
        $projects = Project::orderBy('id','asc')->paginate(10);
        $issues = Issue::count();
        $projectsCount = Project::count();
        $status = Issue::where('status', '!=', 'resolved')->count();
        $priority = Issue::where('risk' ,'=','High')->count();

        // get percentage values / check to avoid for divison by 0
        if ($status >0 && $issues >0) {
        $statusPercentage = ($status /$issues) * 100;
        $statusPercentage = round($statusPercentage, 0);}
        else {
            $statusPercentage = 0;
        }

        if ($priority >0 && $issues >0) {
        $priorityPercentage = ($priority / $issues) * 100;
        $priorityPercentage = round($priorityPercentage, 0); }
        //dd($issues, $status, $amount);
        else {
            $priorityPercentage = 0;
        }

        return view('home' , [ 'user' => $user,
         'projects' => $projects,
         'issues' => $issues,
         'projectscount' => $projectsCount,
         'priority' => $priority,
         'status' => $status,
         'statuspercentage' => $statusPercentage,
         'prioritypercentage' => $priorityPercentage ]);
    }

    public function profile()
    {

           $user = auth()->user();

           return view('admin/profile')->with('user' , $user);

    }

    public function storeProfile(Request $request)
    {
        $this->validate($request,[
            'jobtitle' => 'required',
            ]);

    $user = auth()->user();
    $user->job_title = $request->input('jobtitle');
    // will need image file for this
    $user->profile_image = $request->input('profileimage');
    $user->about_me = $request->input('aboutme');
    $user->update();
    return redirect()->action('AccountsController@profile');

    }

    public function updateProfile()
    {

    $user = auth()->user();
    return view('admin/editprofile')->with('user' , $user);

    }


}
