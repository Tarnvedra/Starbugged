<?php

namespace App\Http\Controllers\Board\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetBoardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'board' => ['required']
        ];

    }
}
