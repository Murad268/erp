<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'count' => 'required|integer',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get custom error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'count.required' => 'Məhsul sayı sahəsi tələb olunur.',
            'count.integer' => 'Məhsul sayı tam ədəd olmalıdır.',
        ];
    }
}
