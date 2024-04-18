<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:posts',
            'status' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'photo' => 'required',
            'description' => 'required|min:10',
            'tag_ids' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Please Select Post Status.',
            'category_id.required' => 'Please Select a category.',
            'sub_category_id.required' => 'Please Select a sub category.',
            'photo.required' => 'Please upload a photo.',
            'tag_ids.required' => 'Please Select At least one tag.',
        ];
    }
}
