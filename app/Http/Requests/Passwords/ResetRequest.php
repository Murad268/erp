<?php

namespace App\Http\Requests\Passwords;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Dəyişikliyi burada edin
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'token.required' => 'Token tələb olunur.',
            'email.required' => 'Email tələb olunur.',
            'email.email' => 'Email düzgün formatda deyil.',
            'password.required' => 'Şifrə tələb olunur.',
            'password.min' => 'Şifrə ən azı 8 simvol olmalıdır.',
            'password.confirmed' => 'Şifrələr uyğun gəlmir.',
        ];
    }
}
