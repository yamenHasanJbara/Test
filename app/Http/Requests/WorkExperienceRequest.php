<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkExperienceRequest extends FormRequest
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
        //date Y-m-d
        if ($this->getMethod() === 'POST') {
            return [
                'start_date' => 'required | date | date_format:Y-m-d',
                'position_name' => 'required | max:100',
                'city' => 'required | max:50',
                'country' => 'required | max:50',
            ];
        }
        return [
            'start_date' => 'date',
            'position_name' => 'max:100',
            'city' => 'max:50',
            'country' => 'max:50'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
            [
                'start_date.required' => 'You should enter start date for the work experience',
                'stare_date.date' => 'Please enter date in the correct from Y-m-d',

                'position_name.required' => 'Please enter the position name',
                'position_name.max' => 'Position name should not be more than 100 characters',

                'city.required' => 'Please enter the city name',
                'city.max' => 'City should not be more than 50 characters',

                'country.required' => 'Please enter the country name',
                'country.max' => 'country should not be more than 50 characters'
            ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]), 422);
    }
}
