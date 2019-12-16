<?php

namespace App\Domain\Accounts\States;

use Spatie\ModelStates\State;
use App\Domain\Accounts\Models\Account;

abstract class AccountState extends State
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public static $states = [
        Active::class,
        Closed::class,
        Expired::class,
    ];

    public function isActive()
    {
        return $this->is(Active::class);
    }

    public function isClosed()
    {
        return $this->is(Closed::class);
    }

    public function isExpired()
    {
        return $this->is(Expired::class);
    }
}
