<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|max:50|min:2|string',
            'description'=>'required|max:500|min:10|string',
            'start_date'=>'required',
            'end_date'=>'required',
            'priority'=>'required',
            'user_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
                'user_id.required' => 'Please select a user.',
                'priority.required' => 'Please select priority level.',
                'start_date.required' => 'Please select a Starting Date.',
                'end_date.required' => 'Please select Event Ending Date.',
        ];
    }
}
