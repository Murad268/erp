<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserNewEmailRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email mütləqdir',
            'email.email' => 'Email düzgün formatda olmalıdır',
            'email.max' => 'Email maksimum 255 simvoldan ibarət ola bilər',
            'email.unique' => 'Bu email artıq qeydiyyatdan keçib',
        ];
    }
}
