<?php
namespace Modules\MenuLinks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Başlıq sahəsi doldurulmalıdır.',
            'title.string' => 'Başlıq sahəsi yalnız mətn ola bilər.',
            'title.max' => 'Başlıq sahəsi maksimum 255 simvol olmalıdır.',
            'slug.required' => 'Slug sahəsi doldurulmalıdır.',
            'slug.string' => 'Slug sahəsi yalnız mətn ola bilər.',
            'slug.max' => 'Slug sahəsi maksimum 255 simvol olmalıdır.',
            'code.required' => 'Kod sahəsi doldurulmalıdır.',
            'code.string' => 'Kod sahəsi yalnız mətn ola bilər.',
            'code.max' => 'Kod sahəsi maksimum 255 simvol olmalıdır.',
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
