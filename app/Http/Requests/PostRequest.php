<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tittle' => ['required'],
            'body' => ['required'],
            'tags' => ['required', 'array'],
            'tags.*' => ['exists:tags,id','integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
