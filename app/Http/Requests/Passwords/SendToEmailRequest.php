<?php

namespace App\Http\Requests\Passwords;

use Illuminate\Foundation\Http\FormRequest;

class SendToEmailRequest extends FormRequest
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
            'email' => 'required|email',
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
            'email.required' => 'Email tələb olunur.',
            'email.email' => 'Email düzgün formatda deyil.',
        ];
    }
}
