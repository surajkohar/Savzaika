<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'coupon_name' => ['required'],
            'coupon_code' => ['required'],
            'coupon_type' => ['required'],
            'discount_value' => ['required','integer'],
            'minimum_amount' => ['required','integer'],
            'start_date' => ['required'],
            'expiration_date' => ['required'],
            'is_active' => ['required'],
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
        ];
    }
}
