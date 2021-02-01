<?php

namespace App\Http\Controllers\Issues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssueRequest extends FormRequest
{

    public function rules()
    {
        return [
            'os' => 'required',
            'risk' => 'required',
            'issue' => 'required',
            'description' => 'required'
        ];
    }
}
