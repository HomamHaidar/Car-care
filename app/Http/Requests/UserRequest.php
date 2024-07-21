<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return \string[][]
     * Set rules validation on creating
     */
    protected function store(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('users')],
            'phone' => ['required', 'string', 'max:20', 'min:9', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns", Rule::unique('users')->ignore($this->id)],
            'phone' => ['required', 'string', 'max:20', 'min:9', Rule::unique('users')->ignore($this->id)],
            'password' => ['nullable', 'string', 'min:8', 'max:255', 'confirmed'],
        ];
    }
    public function rules()
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }
}
