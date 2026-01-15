<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BoissonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'],
            'categorie' => ['required', Rule::in(['alcoolisee', 'sucree'])],

            'type' => [
                Rule::requiredIf(fn () => $this->categorie === 'alcoolisee'),
                'string',
                'max:255',
                'nullable'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:20048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Le type est obligatoire pour une boisson alcoolisée.',
        ];
    }
}
