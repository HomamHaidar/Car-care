<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone'=> 'required|unique:users',
            'email'     => ['required', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('users')],
            'password'  => ['required', 'string', 'min:8', 'max:255'],
        ];
    }
}