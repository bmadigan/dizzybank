<?php

namespace App\Domain\Payments\Projectors;

use App\Domain\Payments\Models\Payment;
use App\Domain\Payments\Events\PaymentMade;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

final class PaymentProjector implements Projector
{
    use ProjectsEvents;

    public function onMoneyAdded(PaymentMade $event, string $aggregateUuid)
    {
        Payment::addPayment($event, $aggregateUuid);
    }
}
