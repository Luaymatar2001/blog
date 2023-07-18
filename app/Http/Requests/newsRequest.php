<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newsRequest extends FormRequest
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
            'title' => 'required|string' ,
            'subject' => 'required|string|max:500|',
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return[
            "title.required"  =>"Title field can't be empty",
            "subject.required"=>"Subject Field Can Not Be Empty ",
            
        ];
        
    }
}
