<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payment_number' => 'required|unique:payments,payment_number,' . $this->route('payment'),
            'payment_date' => 'required|date',
            'payer_name' => 'required|string|max:255',
            'payer_address' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'receiver_address' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0|max:99999999.99',
        ];
    }

    public function messages()
    {
        return [
            'payment_number.required' => 'Ödəniş nömrəsi tələb olunur.',
            'payment_number.unique' => 'Ödəniş nömrəsi unikal olmalıdır.',
            'payment_date.required' => 'Ödəniş tarixi tələb olunur.',
            'payment_date.date' => 'Ödəniş tarixi düzgün formatda olmalıdır.',
            'payer_name.required' => 'Ödəyici adı tələb olunur.',
            'payer_address.required' => 'Ödəyici ünvanı tələb olunur.',
            'receiver_name.required' => 'Qəbul edən adı tələb olunur.',
            'receiver_address.required' => 'Qəbul edən ünvanı tələb olunur.',
            'amount.required' => 'Məbləğ tələb olunur.',
            'amount.numeric' => 'Məbləğ rəqəm olmalıdır.',
            'amount.min' => 'Məbləğ sıfırdan az ola bilməz.',
            'amount.max' => 'Məbləğ çox böyükdür.',
        ];
    }
}
