<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit_event extends FormRequest
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
            'file'=> 'required|mimes:jpeg,png',
            'name'=> 'required',
            'area'=> 'required',
            'district'=> 'required',
            'road_number'=> 'required',
            'house_no'=> 'required',
            'time'=> 'required',
            'date'=> 'required',
            'description'=> 'required'
        ];
    }
}
