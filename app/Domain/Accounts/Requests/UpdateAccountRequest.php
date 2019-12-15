<?php

namespace App\Domain\Accounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'deposit_amount' => 'required',
        ];
    }

    public function adding()
    {
        return $this->has('addMoney');
    }
}
