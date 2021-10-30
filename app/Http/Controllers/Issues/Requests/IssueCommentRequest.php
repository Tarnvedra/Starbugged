<?php

namespace App\Http\Controllers\Issues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueCommentRequest extends FormRequest
{

    public function rules()
    {
        return [
         'body' => ['required', 'string', 'min:3']
        ];
    }

}
