<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LanguageRequest extends FormRequest
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
        return
            [
                'language_id' => 'required | integer ',
            ];

    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
            [
                'language_id.required' => 'Language must not be empty !',
                'language_id.integer' => 'Language must be a number',
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
