<?php

namespace App\Domain\Payments\Events;

use Spatie\EventSourcing\ShouldBeStored;

final class PaymentMade implements ShouldBeStored
{
    public $amount;
    public $accountId;
    public $payeeId;

    public function __construct(int $amount, int $accountId, $payeeId)
    {
        $this->amount = $amount;
        $this->accountId = $accountId;
        $this->payeeId = $payeeId;
    }
}
