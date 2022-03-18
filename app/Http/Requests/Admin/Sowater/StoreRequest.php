<?php

namespace App\Http\Requests\Admin\Sowater;

use Illuminate\Foundation\Http\FormRequest;

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
            'full_name' => 'required',
            'on_column' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Please enter your name',
            'on_column.required' => 'Please enter column is 1, 2 or 3',
        ];
    }
}
