<?php
namespace Modules\Expense\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Təsvir tələb olunur.',
            'description.string' => 'Təsvir mətn olmalıdır.',
            'description.max' => 'Təsvir 255 simvoldan çox olmamalıdır.',
            'amount.required' => 'Məbləğ tələb olunur.',
            'amount.numeric' => 'Məbləğ rəqəm olmalıdır.',
            'amount.min' => 'Məbləğ mənfi ola bilməz.',
            'date.required' => 'Tarix tələb olunur.',
            'date.date' => 'Tarix düzgün formatda olmalıdır.',
        ];
    }
}
