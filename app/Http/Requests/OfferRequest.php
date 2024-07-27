<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfferRequest extends FormRequest
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
            'ar_title' => ['required', 'string'],
            'en_title' => ['required', 'string'],
            'code' => ['required', 'string'],
            'ar_description' => ['required'],
            'en_description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'type' => ['required'],
            'discount' => ['required'],
            'expire_date' => ['required'],
            'service_id' => ['required'],

        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'ar_title' => ['required', 'string'],
            'en_title' => ['required', 'string'],
            'code' => ['required', 'string'],
            'ar_description' => ['required'],
            'en_description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'type' => ['required'],
            'discount' => ['required'],
            'expire_date' => ['required'],
            'service_id' => ['required'],

        ];
    }
    public function rules()
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }
}
