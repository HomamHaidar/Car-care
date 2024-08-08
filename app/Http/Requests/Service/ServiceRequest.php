<?php

namespace App\Http\Requests\Service;

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
    public function rules(): array
    {
        // تحديد القواعد بناءً على نوع الطلب
        if ($this->isMethod('post')) {
            // طلب تخزين
            return $this->store();
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // طلب تحديث
            return $this->update();
        } elseif ($this->isMethod('get')) {
            // طلب بحث (إذا كانت القواعد البحثية مطلوبة)
            return $this->search();
        }

        // القواعد الافتراضية إذا لم يكن الطلب أي من الأنواع المذكورة
        return [];
    }

    /**
     * قواعد التحقق عند التخزين.
     */
    public function store(): array
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string|max:255|min:2',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
        ];
    }

    /**
     * قواعد التحقق عند التحديث.
     */
    public function update(): array
    {
        return [
            'name' => 'required|array',
            'name.*' => 'required|string|max:255|min:2',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
        ];
    }

    /**
     * قواعد التحقق عند البحث.
     */
    public function search(): array
    {
        return [
            'name' => 'required|string|max:255|min:2',
        ];
    }
}
