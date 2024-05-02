<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CalandersFormRequest extends FormRequest
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
            'activity_name' => 'string|min:1|nullable',
            'date' => 'string|min:1|nullable',
            'team_id' => 'nullable',
            'directorate_id' => 'nullable',
            'center_id' => 'nullable',
            'all' => 'string|min:1|nullable',
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
        $data = $this->only(['activity_name', 'date', 'team_id', 'directorate_id', 'center_id', 'all']);



        return $data;
    }

}