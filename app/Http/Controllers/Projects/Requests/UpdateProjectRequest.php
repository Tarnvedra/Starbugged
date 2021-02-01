<?php

namespace App\Http\Controllers\Projects\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{

    public function rules()
    {
        return [
            'project' => 'required',
            'description' => 'required',
        ];
    }
}
