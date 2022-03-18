<?php

namespace App\Http\Requests\Admin\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
        return [
            'title' => 'required',
            'slug' => Rule::unique('events')->ignore($this->get('id'))
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'slug.unique' => 'Slug is exist'
        ];
    }
}
