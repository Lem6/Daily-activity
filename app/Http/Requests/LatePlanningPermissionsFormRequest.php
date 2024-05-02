<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LatePlanningPermissionsFormRequest extends FormRequest
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
            'date_from' => 'nullable',
            'date_to' => 'nullable',
            'user_id' => 'nullable',
            'deadline' => 'string|min:1|nullable',
            'status_activation' => 'string|min:1|nullable',
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
        $data = $this->only(['date_from', 'date_to', 'user_id', 'deadline', 'status_activation']);



        return $data;
    }

}