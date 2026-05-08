<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:50|unique:coupons,code',
            'type' => 'required|in:percentual,fixo',
            'value' => ['required', 'numeric', function ($attribute, $value, $fail) {
                if ($this->input('type') === 'percentual' && $value > 100) {
                    $fail('The value must be less than or equal to 100 for percentual.');
                }
            }],
            'expires_at' => 'nullable|date|after:today',
            'active' => 'required|boolean',
            'usage_limit' => 'nullable|integer|min:1',
        ];
    }
}
