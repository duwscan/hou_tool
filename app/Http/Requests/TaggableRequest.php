<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaggableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'post_id' => ['required', 'exists:posts'],
            'tag_id' => ['required', 'exists:tags'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
