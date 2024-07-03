<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_count' => 'required|integer|min:0',
        ];
    }

    /**
     * Get custom error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Başlıq tələb olunur.',
            'title.string' => 'Başlıq yalnız mətn formatında olmalıdır.',
            'title.max' => 'Başlıq 255 simvoldan uzun ola bilməz.',
            'description.required' => 'Təsvir tələb olunur.',
            'description.string' => 'Təsvir yalnız mətn formatında olmalıdır.',
            'price.required' => 'Qiymət tələb olunur.',
            'price.numeric' => 'Qiymət rəqəmlə olmalıdır.',
            'stock_count.required' => 'Stok sayı tələb olunur.',
            'stock_count.integer' => 'Stok sayı tam ədəd olmalıdır.',
            'stock_count.min' => 'Stok sayı 0-dan az ola bilməz.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
