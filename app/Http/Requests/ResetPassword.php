<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPassword extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone'=> ['required', 'exists:users,phone','numeric'],
            'code' =>  ['required','exists:users,code','numeric'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }


    public function messages()
    {
        return [
            'phone.exists' => 'These credentials do not match our records.',
        ];
    }
}