<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
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

    public function index(ViewFactory $view): View
    {
        $user = auth()->user();
        return $view->make('admin/account', ['user' => $user]);
    }

    public function admin(ViewFactory $view): View
    {
        $user = auth()->user();
        $users = User::orderBy('id', 'asc')->paginate(11);
        $user_roles = Role::get();
        return $view->make('admin/manageusers',
            [   'users' => $users,
                'user' => $user,
                'user_roles' => $user_roles
            ]);
    }

    public function edit(ViewFactory $view,$id): View
    {
        $user = auth()->user();
        $editedUser = User::find($id);
        $roles = Role::all();
        return $view->make('admin/edit' ,
        [
            'editedUser' => $editedUser,
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request,ResponseFactory $response, $id): RedirectResponse
    {
       $user_update = User::find($id);
        //$roles = Role::find($user->id);
        $user_update->username = $request->input('username');
        //$roles->roles = $request->input('roles');
        $user_update->useraccountlevel = $request->input('useraccountlevel');
        $user_update->save();
        return $response->redirectTo('admin-main');
    }

    public function dashboard(ViewFactory $view): View
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
              'projectsCount' => $projectsCount,
              'priority' => $priority,
              'status' => $status,
              'statusPercentage' => $statusPercentage,
              'priorityPercentage' => $priorityPercentage]);
    }

    public function profile(ViewFactory $view): View
    {
        $user = auth()->user();
        return $view->make('admin/profile' , ['user' => $user]);
    }

    public function storeProfile(UpdateProfileRequest $request, ResponseFactory $response): RedirectResponse
    {
       $user = auth()->user();
       $user->job_title = $request->input('jobtitle');
       // will need image file for this
       $user->profile_image = $request->input('profileimage');
       $user->about_me = $request->input('aboutme');
       $user->update();
       return $response->redirectTo('AccountsController@profile');
    }

    public function updateProfile(ViewFactory $view): View
    {
        $user = auth()->user();
        return $view->make('admin/editprofile' , ['user' => $user]);
    }

   // public function usersList(DataTables $tables): JsonResponse
   // {
   //    $users = User::query()->get('id','name','email');
   //    return $tables->eloquent($users)
   //        ->rawColumns(['id','name','email'])->toJson();
   // }

    public function usersList(ResponseFactory $response): JsonResponse
   {
        $users = User::all();
        return $response->json($users);
   }
   // public function usersList()
   // {
   //     return Datatables::of(User::query())->make(true);
   // }

}
