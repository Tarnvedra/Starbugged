<?php

namespace App\Http\Controllers\Issues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIssueRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'os' => 'required',
            'risk' => 'required',
            'issue' => 'required',
            'title' => 'required',
            'description' => 'required'
        ];
    }
}
