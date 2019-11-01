<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Wager;
use Route;

class BuyWagerStoreRequest extends FormRequest
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
            'buying_price' => 'numeric|min:1'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $wager = Wager::find($validator->getData()['wagerId']);

            if ($wager->current_selling_price < 1) {
                $validator->errors()->add('buying_price', 'The chosen wager is no longer available for buying');
                return;
            }

            if ($validator->getData()['buying_price'] < $wager->current_selling_price) {
                $validator->errors()->add('buying_price', 'Buying Price must be equal to greaten to the current selling price of the wager');
            }
        });
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'wagerId' => Route::input('wager_id'),
        ]);
    }
}
