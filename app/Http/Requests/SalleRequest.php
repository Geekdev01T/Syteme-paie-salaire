<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleRequest extends FormRequest
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
            "name" => "required|string|min:3|unique:salles,name",
            "code" => "required|string|min:3|unique:salles,code"
        ];
    }

    //function pour personnaliser les messages d'erreur
    public function messages(): array
    {
        return [
            'name.required' => 'The room name is required.',
            'name.string' => 'The room name must be a string.',
            'name.min' => 'The room name must be at least 3 characters.',
            'name.unique' => 'This room name is already in use.',
            'code.required' => 'The room code is required.',
            'code.string' => 'The room code must be a string.',
            'code.min' => 'The room code must be at least 3 characters.',
            'code.unique' => 'This room code is already in use.',
        ];
    }
}
