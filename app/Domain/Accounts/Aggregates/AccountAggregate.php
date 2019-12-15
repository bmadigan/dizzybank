<?php

namespace App\Domain\Accounts\Aggregates;

use Spatie\EventSourcing\AggregateRoot;
use App\Domain\Accounts\Events\AccountCreated;

final class AccountAggregate extends AggregateRoot
{
    public function createAccount($account_name, $account_type_id)
    {
        $this->recordThat(new AccountCreated($account_name, $account_type_id));

        return $this;
    }

    // public function addMoney(int $amount)
    // {
    //     $this->recordThat(new MoneyAdded($amount));
    // }

    // public function subtractAmount(int $amount)
    // {
    //     $this->recordThat(new MoneySubtracted($amount));
    // }
}
