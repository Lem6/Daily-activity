<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ColorsFormRequest extends FormRequest
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
        $rules = [
            'planing_time' => 'string|min:1|required',
            'reporting_time' => 'string|min:1|nullable',
            'color' => 'string|min:1|required',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['planing_time', 'reporting_time', 'color']);



        return $data;
    }

}