<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class write_article extends FormRequest
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
            
            'title'=> 'required',
            'article'=> 'required',
            'file'=> 'required|mimes:jpg,png,jpeg|max:20000',
            'category'=> 'required|array|min:1',

        ];
    }
}
