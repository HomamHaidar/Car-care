<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function store(): array
    {
        return [
            'ar.name' => ['required', 'string'],
            'en.name' => ['required', 'string'],
            'price' => ['required'],
            'available' => ['required'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name' => ['required', 'string'],
            'price' => ['required'],
            'available' => ['required'],

        ];
    }
    public function rules()
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }
}
