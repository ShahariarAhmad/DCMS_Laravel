<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class make_appointment extends FormRequest
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
            "desired_date" => "required",
            "cid" => "required",
            "method" => "required",
            "transaction" => "required",
            "from" => "required||digits:11",
            "amount" => "required|numeric",
            "to" => "required|digits:11",
        ];
    }
}
