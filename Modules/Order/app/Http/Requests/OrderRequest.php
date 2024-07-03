<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'order_status' => 'required|integer',
            'customer_name' => 'required|string|max:255',
            'customer_surname' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'order_status.required' => 'Sifariş statusu mütləqdir.',
            'customer_name.required' => 'Müştərinin adı mütləqdir.',
            'customer_surname.required' => 'Müştərinin soyadı mütləqdir.',
            'customer_email.required' => 'Müştərinin emaili mütləqdir.',
            'phone.required' => 'Telefon nömrəsi mütləqdir.',
            'address.required' => 'Ünvan mütləqdir.',
        ];
    }
}
