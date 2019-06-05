<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string',
            'name' => 'bail|required|string',
            'email' => 'bail|required|email',
            'body' => 'bail|required|string'
        ];
    }

    public function messages(){
        return [
            'title.required' => "Title is required",
            'body.required' => "Please enter your message.",
            'name.required' => "Please enter name.",
            'name.string' => "Your name is invalid. Please enter a valid name.",
            'email.email' => "Your email address is invalid. Please enter a valid address.",
            'email.required' => "Please enter email."
        ];
    }
}
