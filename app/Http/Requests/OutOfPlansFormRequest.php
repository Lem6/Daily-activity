<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class OutOfPlansFormRequest extends FormRequest
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
            'activity' => 'string|min:1|nullable',
            'date' => 'string|min:1|nullable',
            'user_id' => 'nullable',
            'team_id' => 'nullable',
            'directorate_id' => 'nullable',
            'center_id' => 'nullable',
            'approved_by' => 'nullable',
            'reject_reason' => 'string|min:1|nullable',
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
        $data = $this->only(['activity', 'date', 'user_id', 'team_id', 'directorate_id', 'center_id', 'approved_by', 'reject_reason']);



        return $data;
    }

}