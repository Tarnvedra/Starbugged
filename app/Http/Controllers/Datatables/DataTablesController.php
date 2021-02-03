<?php

namespace App\Http\Controllers\Datatables;


use App\User;
use App\Http\Controllers\Controller;


class DataTablesController extends Controller
{
    public function users() // UserTableComponent.vue
    {
        return response()->json([

            'users' => User::all()

        ]);
    }
}
