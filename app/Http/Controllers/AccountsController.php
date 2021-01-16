<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use App\User;
use App\Role;
use App\Project;
use App\Issue;

class AccountsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(ViewFactory $view)
    {
        $user = auth()->user();
        return $view->make('admin/account', ['user' => $user]);
    }

    public function admin(ViewFactory $view)
    {
        $user = auth()->user();
        $users = User::orderBy('username', 'asc')->paginate(11);
        $user_roles = Role::get();
        return $view->make('admin/manageusers',
            [   'users' => $users,
                'user' => $user,
                'user_roles' => $user_roles
            ]);
    }

    public function edit(ViewFactory $view,$id)
    {
        $user = auth()->user();
        $editeduser = User::find($id);
        $roles = Role::all();
        return $view->make('admin/edit' ,
        [
            'editeduser' => $editeduser,
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function update( Request $request,ResponseFactory $repspone, $id)
    {
        $this->validate($request, [
            'username' => 'required',

            'useraccountlevel' => 'required',

        ]);
        $user_update = User::find($id);
        //$roles = Role::find($user->id);
        $user_update->username = $request->input('username');
        //$roles->roles = $request->input('roles');
        $user_update->useraccountlevel = $request->input('useraccountlevel');
        $user_update->save();
        return $repspone->redirectTo('AccountsController@admin');
    }

    public function dashboard(ViewFactory $view)
    {
        $user = auth()->user();
        $projects = Project::orderBy('id', 'asc')->paginate(10);
        $issues = Issue::count();
        $projectsCount = Project::count();
        $status = Issue::where('status', '!=', 'resolved')->count();
        $priority = Issue::where('risk', '=', 'High')->count();

        // get percentage values / check to avoid for divison by 0
        if ($status > 0 && $issues > 0) {
            $statusPercentage = ($status / $issues) * 100;
            $statusPercentage = round($statusPercentage, 0);
        } else {
            $statusPercentage = 0;
        }

        if ($priority > 0 && $issues > 0) {
            $priorityPercentage = ($priority / $issues) * 100;
            $priorityPercentage = round($priorityPercentage, 0);
        }
        else {
            $priorityPercentage = 0;
        }

        return $view->make('home',
            [ 'user' => $user,
              'projects' => $projects,
              'issues' => $issues,
              'projectscount' => $projectsCount,
              'priority' => $priority,
              'status' => $status,
              'statuspercentage' => $statusPercentage,
              'prioritypercentage' => $priorityPercentage]);
    }

    public function profile(ViewFactory $view)
    {
        $user = auth()->user();
        return $view->make('admin/profile' , ['user' => $user]);
    }

    public function storeProfile(Request $request, ResponseFactory $response)
    {
        $this->validate($request, [
            'jobtitle' => 'required',
        ]);
        $user = auth()->user();
        $user->job_title = $request->input('jobtitle');
        // will need image file for this
        $user->profile_image = $request->input('profileimage');
        $user->about_me = $request->input('aboutme');
        $user->update();
        return $response->redirectTo('AccountsController@profile');

    }

    public function updateProfile(ViewFactory $view)
    {
        $user = auth()->user();
        return $view->make('admin/editprofile' , ['user' => $user]);
    }
}
