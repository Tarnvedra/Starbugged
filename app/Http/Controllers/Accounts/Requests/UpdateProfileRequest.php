<?php

namespace App\Http\Controllers\Accounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{


    public function rules()
    {
        return [
            'jobtitle' => 'required'
        ];
    }
}
