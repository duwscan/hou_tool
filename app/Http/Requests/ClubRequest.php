<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'detail' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
