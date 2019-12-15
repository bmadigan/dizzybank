<?php

namespace App\Domain\Accounts\Events;

use Spatie\EventSourcing\ShouldBeStored;

final class AccountCreated implements ShouldBeStored
{
    public $account_name;
    public $account_type_id;

    public function __construct($account_name, $account_type_id)
    {
        $this->account_name = $account_name;
        $this->account_type_id = $account_type_id;
    }
}
