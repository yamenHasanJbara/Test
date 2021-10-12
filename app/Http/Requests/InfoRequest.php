<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InfoRequest extends FormRequest
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
        if ($this->getMethod() === 'POST') {
            return [
                'address' => 'required | string | max:200',
                'phone' => 'required | max:20',
                'birthday' => 'required | date',
                'gender' => 'required | integer | between:1,2',
                'nationality' => 'required | string | max:50',
                'university' => 'required | string | max:50',
                'degree' => 'required | string | max:50',
                'summary' => 'required | string | max:2000',
            ];
        }
        return [
            'address' => 'string | max:200',
            'phone' => 'max:20',
            'birthday' => 'date',
            'gender' => 'integer | between:1,2',
            'university' => 'string | max:50',
            'degree' => 'string | max:50',
            'summary' => 'string | max:2000'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
            [
                'address.required' => 'Address must not be empty !',
                'address.string' => 'Address must be a character',
                'address.max' => 'Address must not be more than 200 character',

                'phone.required' => 'Phone must not be empty !',
                'phone.max' => 'Phone must not be more than 20 number',

                'birthday.required' => 'Birthday must not be empty !',
                'birthday.date' => 'Birthday must be a date in form Y-m-d',

                'gender.required' => 'Gender is required !',
                'gender.integer' => 'Gender must be a number',
                'gender.between' => 'Gender must be 1 for male or 2 for female',

                'university.required' => 'University must not be empty !',
                'university.string' => 'University must be a character',
                'university.max' => 'University must not be more than 50 character',

                'nationality.required' => 'Nationality must not be empty !',
                'nationality.string' => 'Nationality must be a character',
                'nationality.max' => 'Nationality must not be more than 50 character',

                'degree.required' => 'Degree must not be empty !',
                'degree.string' => 'Degree must be a character',
                'degree.max' => 'Degree must not be more than 50 character',

                'summary.required' => 'Summary must not be empty !',
                'summary.string' => 'Summary must be a character',
                'summary.max' => 'Summary must not be more than 2000 character',
            ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw  new HttpResponseException(response()->json(['errors' => $validator->errors()]), 422);
    }
}
