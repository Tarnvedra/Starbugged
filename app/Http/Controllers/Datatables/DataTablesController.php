<?php

namespace App\Http\Controllers\Datatables;


use App\Http\Controllers\Controller;
use App\Models\User;


class DataTablesController extends Controller
{
    public function users() // UserTableComponent.vue
    {
        return response()->json([

            'users' => User::all()

        ]);
    }
}
