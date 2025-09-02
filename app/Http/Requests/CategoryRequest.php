<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|unique:categories|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ];

        if ($this->isMethod('PATCH')) {
            $categoryId = $this->route('kategoriler');
            $rules['name'] = 'required|string|unique:categories,name,' . $categoryId . '|max:255';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'kategori adı',
            'parent_id' => 'üst kategori',
            'is_active' => 'durum',
        ];
    }
}
