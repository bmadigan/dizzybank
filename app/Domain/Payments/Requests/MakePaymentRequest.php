<?php

namespace App\Domain\Payments\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'amount' => 'required',
        ];
    }

    public function adding()
    {
        return $this->has('addMoney');
    }
}
