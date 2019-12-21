<?php

namespace App\Domain\Payments\Aggregates;

use Spatie\EventSourcing\AggregateRoot;
use App\Domain\Payments\Events\PaymentMade;

final class PaymentAggregate extends AggregateRoot
{
    public function makePayment($amount, $accountId, $payeeId)
    {
        $this->recordThat(new PaymentMade($amount, $accountId, $payeeId));

        return $this;
    }
}
