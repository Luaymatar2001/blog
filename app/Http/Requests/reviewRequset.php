<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reviewRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'rate' => 'required|in:1,2,3,4,5',
            'news_id' => 'required|exists:news,id',

        ];
    }
    public function messages()
    {
        return[

        ];
    }
}
