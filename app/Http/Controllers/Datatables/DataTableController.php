<?php

namespace App\Http\Controllers\Datatables;


use App\User;
use App\Http\Controllers\Controller;


class DataTableController extends Controller
{
    public function users() // UserTableComponent.vue
    {
        return response()->json([

            'users' => User::all()

        ]);
    }
}
