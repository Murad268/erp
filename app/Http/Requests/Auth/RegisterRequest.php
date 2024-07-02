<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tam ad mütləqdir.',
            'name.string' => 'Tam ad yalnız hərflərdən ibarət olmalıdır.',
            'name.max' => 'Tam ad maksimum 255 simvoldan ibarət ola bilər.',
            'email.required' => 'Email mütləqdir.',
            'email.string' => 'Email düzgün formatda deyil.',
            'email.email' => 'Email düzgün formatda olmalıdır.',
            'email.max' => 'Email maksimum 255 simvoldan ibarət ola bilər.',
            'email.unique' => 'Bu email artıq qeydiyyatdan keçib.',
            'password.required' => 'Şifrə mütləqdir.',
            'password.string' => 'Şifrə düzgün formatda deyil.',
            'password.min' => 'Şifrə minimum 8 simvoldan ibarət olmalıdır.',
            'password.confirmed' => 'Şifrə təsdiqi uyğun gəlmir.',
        ];
    }
}
