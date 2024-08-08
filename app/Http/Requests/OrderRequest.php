<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'name'     => ['required', 'string', 'max:50', 'min:5'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns"],
            'phone'    => ['required','digits_between:9,11' ],
            'services_time' => ['required','date', 'after:now' , Rule::unique('orders') ],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
            'car_brand' => ['required'],
            'car_category' => ['required'],
            'car_oil' => ['nullable'],
            'coupon_code' => ['nullable'],
            'service_id' => ['required', 'exists:services,id','array'],
        ];
    }

    /**
     * @return \string[][]
     * Set rules validation on updating
     */
    protected function update(): array
    {

        return [
            'name'     => ['required', 'string', 'max:50', 'min:5'],
            'email'    => ['required', 'string', 'max:125', 'min:9', "email:rfc,dns"],
            'phone'    => ['required','digits_between:9,11' ],
            'services_time' => ['required','date', 'after:now' , Rule::unique('orders') ],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
            'car_brand' => ['required'],
            'car_category' => ['required'],
            'car_oil' => ['nullable'],
            'coupon_code' => ['nullable'],
            'service_id' => ['required', 'exists:services,id','array'],
        ];
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {

        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->update() : $this->store();
    }
}
