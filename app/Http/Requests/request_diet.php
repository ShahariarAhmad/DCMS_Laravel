<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class request_diet extends FormRequest
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
            'person_name'=> 'required',
            'age'=> 'required|numeric',
            'gender'=> 'required',
            'height'=> 'required',
            'weight'=> 'required',
            'method'=> 'required',
            'trix'=> 'required',
            'amount'=> 'required|numeric',
            'from'=> 'required|digits:11',
            'to'=> 'required|digits:11',
            'question_i'=> 'required',
            'question_ii'=> 'required',
            'question_iii'=> 'required',
            'question_v'=> 'required',
            'question_iv'=> 'required', 
            'question_vi'=> 'required', 
        ];
    }
}
