<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thread_name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
