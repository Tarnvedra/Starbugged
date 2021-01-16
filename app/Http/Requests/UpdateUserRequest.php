<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
                'username' => 'required',
                'useraccountlevel' => 'required',
        ];

    }
}
