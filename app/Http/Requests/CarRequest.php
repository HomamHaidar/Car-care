<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand' => ['required'],
            'category' => ['required'],
            'is_oil' => ['nullable'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'brand' => ['required'],
            'category' => ['required'],
            'is_oil' => ['nullable'],

        ];
    }
    public function rules()
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }
}
