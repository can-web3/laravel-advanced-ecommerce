<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'bail|required|string|email|max:255',
            'password' => 'bail|required|string|min:6|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'E-posta',
            'password' => 'Şifre',
        ];
    }
}
