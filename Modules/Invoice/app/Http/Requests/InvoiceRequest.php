<?php

namespace Modules\Invoice\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $invoiceId = $this->route('invoice') ? $this->route('invoice')->id : null;

        return [
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoiceId,
            'invoice_date' => 'required|date',
            'seller_name' => 'required|string|max:255',
            'seller_address' => 'required|string|max:255',
            'buyer_name' => 'required|string|max:255',
            'buyer_address' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0|max:999.99',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'tax_amount' => 'required|numeric|min:0|max:9999.99',
            'grand_total' => 'required|numeric|min:0|max:999.99',
        ];
    }

    public function messages()
    {
        return [
            'invoice_number.required' => 'Faktura nömrəsi tələb olunur.',
            'invoice_number.unique' => 'Faktura nömrəsi unikal olmalıdır.',
            'invoice_date.required' => 'Faktura tarixi tələb olunur.',
            'invoice_date.date' => 'Faktura tarixi düzgün formatda olmalıdır.',
            'seller_name.required' => 'Satıcı adı tələb olunur.',
            'seller_name.max' => 'Satıcı adı 255 simvoldan uzun ola bilməz.',
            'seller_address.required' => 'Satıcı ünvanı tələb olunur.',
            'seller_address.max' => 'Satıcı ünvanı 255 simvoldan uzun ola bilməz.',
            'buyer_name.required' => 'Alıcı adı tələb olunur.',
            'buyer_name.max' => 'Alıcı adı 255 simvoldan uzun ola bilməz.',
            'buyer_address.required' => 'Alıcı ünvanı tələb olunur.',
            'buyer_address.max' => 'Alıcı ünvanı 255 simvoldan uzun ola bilməz.',
            'total_amount.required' => 'Ümumi məbləğ tələb olunur.',
            'total_amount.numeric' => 'Ümumi məbləğ rəqəm olmalıdır.',
            'total_amount.min' => 'Ümumi məbləğ sıfırdan az ola bilməz.',
            'total_amount.max' => 'Ümumi məbləğ çox böyükdür.',
            'tax_rate.required' => 'Vergi dərəcəsi tələb olunur.',
            'tax_rate.numeric' => 'Vergi dərəcəsi rəqəm olmalıdır.',
            'tax_rate.min' => 'Vergi dərəcəsi sıfırdan az ola bilməz.',
            'tax_rate.max' => 'Vergi dərəcəsi 100-dən çox ola bilməz.',
            'tax_amount.required' => 'Vergi məbləği tələb olunur.',
            'tax_amount.numeric' => 'Vergi məbləği rəqəm olmalıdır.',
            'tax_amount.min' => 'Vergi məbləği sıfırdan az ola bilməz.',
            'tax_amount.max' => 'Vergi məbləği çox böyükdür.',
            'grand_total.required' => 'Ümumi cəm tələb olunur.',
            'grand_total.numeric' => 'Ümumi cəm rəqəm olmalıdır.',
            'grand_total.min' => 'Ümumi cəm sıfırdan az ola bilməz.',
            'grand_total.max' => 'Ümumi cəm çox böyükdür.',
        ];
    }
}
