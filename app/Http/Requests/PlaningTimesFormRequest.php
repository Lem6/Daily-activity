<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PlaningTimesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'plan_start_time' => 'string|min:1|nullable',
            'plan_end_time' => 'string|min:1|nullable',
            'progress_start_time' => 'string|min:1|nullable',
            'progress_end_time' => 'string|min:1|nullable',
            'additional_time' => 'string|min:1|nullable',
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
        $data = $this->only(['plan_start_time', 'plan_end_time', 'progress_start_time', 'progress_end_time', 'additional_time']);



        return $data;
    }

}