<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraduateStandardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'file_path' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
