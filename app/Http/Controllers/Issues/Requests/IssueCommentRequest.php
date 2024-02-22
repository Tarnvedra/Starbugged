<?php

namespace App\Http\Controllers\Issues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueCommentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
         'issue_body_comment' => ['required', 'string', 'min:3']
        ];
    }

}
