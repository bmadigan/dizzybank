<?php

namespace App\Domain\Accounts\Events;

use Spatie\EventSourcing\ShouldBeStored;

final class MoneySubtracted implements ShouldBeStored
{
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
}
