<?php

namespace App\Domain\Accounts\Projectors;

//use App\Domain\Accounts\Events\AccountDeleted;
use App\Domain\Accounts\Events\MoneyAdded;
use App\Domain\Accounts\Events\MoneySubtracted;
use App\Domain\Accounts\Models\Transaction;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

final class TransactionProjector implements Projector
{
    use ProjectsEvents;

    public function onMoneyAdded(MoneyAdded $event, string $aggregateUuid)
    {
        Transaction::moneyAdded($event, $aggregateUuid);
    }

    public function onMoneySubtracted(MoneySubtracted $event, string $aggregateUuid)
    {
        Transaction::moneySubtracted($event, $aggregateUuid);
    }

    // public function onAccountDeleted(string $aggregateUuid)
    // {
    //     $account = Account::uuid($aggregateUuid);
    //     Transaction::where('account_id', '=', $account->id)->delete();
    // }
}
