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
        $rules = [
            'code' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'type' => ['required'],
            'discount' => ['required'],
            'expire_date' => ['required'],
            'service_id' => ['required'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '_title'] = 'required|min:2|max:100';
        }
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '_description'] = 'required|min:2|max:200';
        }
        return $rules;

    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {
        $rules = [
            'code' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'type' => ['required'],
            'discount' => ['required'],
            'expire_date' => ['required'],
            'service_id' => ['required'],

        ];
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '_title'] = 'required|min:2|max:100';
        }
        foreach (config('translatable.locales') as $one_lang) {
            $rules[$one_lang . '_description'] = 'required|min:2|max:100';
        }
        return $rules;
    }
    public function rules()
    {

        return request()->isMethod('put') || request()->isMethod('patch') ? $this->update() : $this->store();
    }
}






