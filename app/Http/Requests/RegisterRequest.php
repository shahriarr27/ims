<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'cv' => 'required|mimes:pdf',
            'city1' => 'required',
            'post_code' => 'required',
            'chapter' => 'required',
            'gender' => 'required',
        ];
    }
}
