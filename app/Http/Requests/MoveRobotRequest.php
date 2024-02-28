<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoveRobotRequest extends FormRequest
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
            // regex for only F, B, E, L characters
            'move' => ['required','string','regex:/^[F|B|R|L]+$/']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'move.required' => 'The move field is required.',
            'move.string'   => 'The move field must be a string.',
            'move.regex'    => 'The move field must contain only the following characters: F, B, R, L.'
        ];
    }
}
