<?php

namespace App\Domain\Accounts\Actions;

use Lorisleiva\Actions\Action;
use App\Domain\Accounts\Models\Account;

class CreateNewAccountAction extends Action
{
    public function rules()
    {
        return [
            'account_name' => 'required|min:8'
        ];
    }

    public function handle()
    {
        return Account::create($this->validated());
    }
}
