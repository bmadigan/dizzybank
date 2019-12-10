<?php

namespace App\Domain\Accounts\Models;

use App\Support\Model;

class AccountType extends Model
{
    public $timestamps = false;

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
