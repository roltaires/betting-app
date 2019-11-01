<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WagerStoreRequest extends FormRequest
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
            'total_wager_value'  => "required|numeric|min:1",
            'odds'               => "required|numeric|min:1",
            'selling_percentage' => 'required|numeric|between:1,100',
            'selling_price'      => 'required|numeric|sellingprice'
        ];
    }

    public function messages()
    {
        return [
            'total_wager_value.min' => "asdadas"
        ];
    }
}
