<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PlanTasksFormRequest extends FormRequest
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
            'task_name' => 'string|min:1|nullable',
            'progress' => 'string|min:1|nullable',
            'percent' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'challenge' => 'string|min:1|nullable',
            'approved_by' => 'nullable',
            'reject_reason' => 'string|min:1|nullable',
            'user_id' => 'nullable',
            'team_id' => 'nullable',
            'directorate_id' => 'nullable',
            'center_id' => 'nullable',
            'plan_task_id' => 'nullable',
            'date' => 'string|min:1|nullable',
            'progress_time' => 'string|min:1|nullable',
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
        $data = $this->only(['task_name', 'progress', 'percent', 'description', 'challenge', 'approved_by', 'reject_reason', 'user_id', 'team_id', 'directorate_id', 'center_id', 'plan_task_id', 'date', 'progress_time']);



        return $data;
    }

}