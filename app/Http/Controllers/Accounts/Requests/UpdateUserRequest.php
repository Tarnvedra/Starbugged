<?php

namespace App\Http\Controllers\Accounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
                'username' => 'required'
        ];

    }
}
