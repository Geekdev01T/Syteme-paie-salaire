<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtatRequest extends FormRequest
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
            'date' => 'required|date|before:tomorrow|unique:etats,date,NULL,id,employer_id,' . $this->employer_id . ',state,' . $this->state,
            'hour' => 'nullable|integer|min:1|max:10',
            'state' => 'required|in:study,supervised-work,monitoring',
            'employer_id' => 'required|exists:employers,id',
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
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'date.before' => 'The date must be before tomorrow.',
            'date.unique' => 'This employee already has a record for this date and state.',
            'hour.integer' => 'The hour must be an integer.',
            'hour.min' => 'The hour must be at least 1.',
            'hour.max' => 'The hour may not be greater than 10.',
            'state.required' => 'The state field is required.',
            'state.in' => 'The selected state is invalid.',
            'employer_id.required' => 'The employer field is required.',
            'employer_id.exists' => 'The selected employer does not exist.',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $date = $this->input('date');
            $employer_id = $this->input('employer_id');
            $state = $this->input('state');

            if ($date && $employer_id && $state) {
                $query = \App\Models\Etat::where('date', $date)
                    ->where('employer_id', $employer_id);

                // Si on est en update, on exclut l'ID courant
                if ($this->route('etat')) {
                    $query->where('id', '!=', $this->route('etat')->id);
                }

                $existing = $query->pluck('state')->toArray();

                if ($state === 'monitoring' && count($existing) > 0) {
                    $validator->errors()->add('state', 'You cannot add "monitoring" if another state exists for this date.');
                }
                if ($state !== 'monitoring' && in_array('monitoring', $existing)) {
                    $validator->errors()->add('state', 'You cannot add another state for this date if "monitoring" already exists.');
                }
            }
        });
    }
}
