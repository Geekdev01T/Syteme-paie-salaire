<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'nullable|min:4'
        ];
    }

    //Fonction pour personnaliser les messages d'erreur
    public function messages(): array
    {
        return [
            'name.required' => 'The admin name is required.',
            'name.string' => 'The admin name must be a string.',
            'name.min' => 'The admin name must be at least 3 characters.',
            'email.required' => 'The admin email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already in use.',
            // 'password.required' => 'The admin email is required.',
        ];
    }
}
