<?php

namespace App\Http\Requests;

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
            'full_name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255|unique:users',
            'phone' => 'bail|nullable|string|regex:/^0?5\d{9}$/|max:255',
            'password' => 'bail|required|string|min:6|max:255',
            'repassword' => 'bail|same:password',
        ];
    }

    public function attributes(): array
    {
        return [
            'full_name' => 'Ad',
            'email' => 'E-posta',
            'phone' => 'Telefon',
            'password' => 'Şifre',
            'repassword' => 'Şifre (Tekrar)',
        ];
    }
}
