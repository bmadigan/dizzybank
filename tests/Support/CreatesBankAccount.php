<?php

namespace Tests\Support;

use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\States\Closed;
use App\Domain\Accounts\States\Expired;
use App\Domain\Accounts\Models\Account;

// Make sure to Autoload in composer json
trait CreatesBankAccount
{
    public function createsActiveAccount($user)
    {
        $bankAccount = factory(Account::class)->create($this->activeAccountData());
        $bankAccount->users()->save($user);

        return $bankAccount->fresh();
    }

    public function createsExpiredAccount($user)
    {
        $bankAccount = factory(Account::class)->create($this->expiredAccountData());
        $bankAccount->users()->save($user);

        return $bankAccount->fresh();
    }

    public function createsClosedAccount($user)
    {
        $bankAccount = factory(Account::class)->create($this->closedAccountData());
        $bankAccount->users()->save($user);

        return $bankAccount->fresh();
    }

    protected function activeAccountData()
    {
        return [
            'account_name' => 'Active Bank Account',
            'account_type_id' => 1,
            'state' => Active::class,
        ];
    }

    protected function expiredAccountData()
    {
        return [
            'account_name' => 'Expired Bank Account',
            'account_type_id' => 1,
            'state' => Expired::class,
        ];
    }

    protected function closedAccountData()
    {
        return [
            'account_name' => 'Closed Bank Account',
            'account_type_id' => 1,
            'state' => Closed::class,
        ];
    }
}