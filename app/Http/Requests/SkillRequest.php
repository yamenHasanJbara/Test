<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'skill_id' => 'required|integer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
            [
                'skill_id.required' => 'Skill must not be empty !',
                'skill_id.integer' => 'Skill must be a number'
            ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $this->validator->errors()]), 422);
    }
}

