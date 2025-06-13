<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'type_organisation' => 'required|in:etablissement_scolaire,entreprise,association,universite,gouvernement,ong',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000', // 5MB max
            'email' => 'required|email|max:255',
            'phone1' => 'required|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'slogan.string' => 'The slogan must be a string.',
            'slogan.max' => 'The slogan may not be greater than 255 characters.',
            'type_organisation.required' => 'The type of organization is required.',
            'type_organisation.in' => 'The type of organization must be one of the following: etablissement_scolaire, entreprise, association, universite, gouvernement, ong.',
            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be in jpeg, png, jpg, gif, or svg format.',
            'logo.max' => 'The logo size may not exceed 5 MB.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email is already in use.',
            'phone1.required' => 'The primary phone number is required.',
            'phone1.string' => 'The primary phone number must be a string.',
            'phone1.max' => 'The primary phone number may not be greater than 20 characters.',
            'phone2.string' => 'The secondary phone number must be a string.',
            'phone2.max' => 'The secondary phone number may not be greater than 20 characters.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.'
        ];
    }
}
