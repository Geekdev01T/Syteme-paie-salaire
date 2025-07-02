<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributionRequest extends FormRequest
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
            'employer_id' => 'required|exists:employers,id',
            'cours_id' => 'required|exists:cours,id',
            'classe_id' => 'required|exists:classes,id',
            'annee_academique' => 'required|string',
        ];
    }

    //
    public function messages(): array
{
    return [
        'employer_id.required' => 'The employer field is required.',
        'employer_id.exists' => 'The selected employer does not exist.',
        'cours_id.required' => 'The course field is required.',
        'cours_id.exists' => 'The selected course does not exist.',
        'classe_id.required' => 'The class field is required.',
        'classe_id.exists' => 'The selected class does not exist.',
        'annee_academique.required' => 'The academic year field is required.',
        'annee_academique.string' => 'The academic year must be a string.',
    ];
}

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $employerId = $this->input('employer_id');
            $coursId = $this->input('cours_id');
            $classeId = $this->input('classe_id');
            $annee = $this->input('annee_academique');

            // Vérifier que le cours est bien associé à l'employé
            $employer = \App\Models\Employer::find($employerId);
            if ($employer && !$employer->cours()->where('cours.id', $coursId)->exists()) {
                $validator->errors()->add('cours_id', 'This course is not associated with this employee.');
            }

            // Vérifier que la classe est bien associée à l'employé
            if ($employer && !$employer->classes()->where('classes.id', $classeId)->exists()) {
                $validator->errors()->add('classe_id', 'This class is not associated with this employee.');
            }

            // Vérifier l'unicité de l'attribution pour employer, classe, cours (peu importe l'année)
            $exists = \App\Models\Attribution::where('employer_id', $employerId)
                ->where('cours_id', $coursId)
                ->where('classe_id', $classeId)
                ->exists();

            if ($exists) {
                $validator->errors()->add('employer_id', 'This employee already has this course in this class, assignment not possible.');
            }

            // Vérifier qu'un seul employé peut avoir (cours, classe)
            $exists = \App\Models\Attribution::where('cours_id', $coursId)
                ->where('classe_id', $classeId)
                ->exists();

            if ($exists) {
                $validator->errors()->add('cours_id', 'This course and class combination is already assigned to an employee.');
            }
        });
    }
}
