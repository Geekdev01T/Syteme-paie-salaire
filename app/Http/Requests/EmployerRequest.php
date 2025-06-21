<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'first_name'=> 'required|string|min:3',
            'email' => 'required|email|unique:employers,email',
            'contact' => 'required|string|max:15|unique:employers,contact',
            'status' => 'required|in:permanent,intermittent',
            'honorary' => 'nullable|numeric|min:500',
            'fixed_salary' => 'nullable|numeric|min:10000',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            // Ajoutez d'autres règles de validation si nécessaire
        ];
    }

    //Fonction pour personnaliser les messages d'erreur
    public function messages(): array
    {
        return [
            'name.required' => 'The employer name is required.',
            'name.string' => 'The employer name must be a string.',
            'name.min' => 'The employer name must be at least 3 characters.',
            'first_name.required' => 'The employer first name is required.',
            'first_name.string' => 'The employer first name must be a string.',
            'first_name.min' => 'The employer first name must be at least 3 characters.',
            'email.required' => 'The employer email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already in use.',
            'contact.string' => 'The contact number must be a string.',
            'contact.max' => 'The contact number may not be greater than 15 characters.',
            'contact.unique' => 'This contact is already in use.',
            // 'departement_id.required' => 'The department is required.',
            // 'departement_id.exists' => 'The selected department does not exist.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be either permanent or intermittent.',
            'honorary.numeric' => 'The honorary must be a number.',
            'honorary.min' => 'The honorary must be at least 500.',
            'fixed_salary.numeric' => 'The fixed salary must be a number.',
            'fixed_salary.min' => 'The fixed salary must be at least 10000.',
            // 'profile.image' => 'The profile must be an image.',
            // 'profile.mimes' => 'The profile image must be a file of type: jpeg, png, jpg, gif, svg.',
            'profile.max' => 'The profile image may not be greater than 5Mo.',
        ];
    }
}
