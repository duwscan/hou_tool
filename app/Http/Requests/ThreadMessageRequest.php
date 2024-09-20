<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'thread_id' => ['required', 'exists:threads'],
            'sender' => ['required'],
            'timestamp' => ['required', 'date'],
            'message' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
