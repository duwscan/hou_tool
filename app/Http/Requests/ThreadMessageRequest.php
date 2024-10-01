<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sender' => ['in:bot,user'],
            'timestamp' => ['date'],
            'message' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
