<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            // 'app_name' => 'required|string|max:255',
            // 'language' => 'required|in:english,french',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000', // 5MB max
            'paiement_date' => 'required|integer',
            'state_sheet_date' => 'required|integer|min:25|max:31',
            'supervised_work_fee' => 'required|integer|min:500',
            'monitoring_fee' => 'required|integer|min:1000',
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
            // 'app_name.required' => 'The application name is required.',
            // 'app_name.string' => 'The application name must be a string.',
            // 'app_name.max' => 'The application name may not be greater than 255 characters.',
            // 'language.required' => 'The language is required.',
            // 'language.in' => 'The language must be either english or french.',
            // 'logo.image' => 'The logo must be an image.',
            // 'logo.mimes' => 'The logo must be in jpeg, png, jpg, gif, or svg format.',
            // 'logo.max' => 'The logo size may not exceed 5 MB.',
            'paiement_date.required' => 'The payment date is required.',
            'paiement_date.integer' => 'The payment date must be an integer.',
            'state_sheet_date.required' => 'The state sheet date is required.',
            'state_sheet_date.integer' => 'The state sheet date must be an integer.',
            'state_sheet_date.min' => 'The state sheet date must be at least 25.',
            'state_sheet_date.max' => 'The state sheet date may not exceed 31.',
            'supervised_work_fee.required' => 'The supervised work fee is required.',
            'supervised_work_fee.integer' => 'The supervised work fee must be an integer.',
            'supervised_work_fee.min' => 'The supervised work fee must be at least 500.',
            'monitoring_fee.required' => 'The monitoring fee is required.',
            'monitoring_fee.integer' => 'The monitoring fee must be an integer.',
            'monitoring_fee.min' => 'The monitoring fee must be at least 1000.'
        ];
    }

    //Validation personnaliser
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $value = $this->paiement_date;
            if (!(
                ($value >= 1 && $value <= 10) ||
                ($value >= 25 && $value <= 31)
            )) {
                $validator->errors()->add('paiement_date', 'The payment date must be between 1-10 or 25-31.');
            }
        });
    }
}
