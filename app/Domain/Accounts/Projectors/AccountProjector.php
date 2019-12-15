<?php

namespace App\Domain\Accounts\Projectors;

use App\Domain\Users\Models\User;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Events\AccountCreated;
use App\Domain\Accounts\Events\MoneyAdded;
use App\Domain\Accounts\Events\MoneySubtracted;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

final class AccountProjector implements Projector
{
    use ProjectsEvents;

    public function onAccountCreated(AccountCreated $event, string $aggregateUuid)
    {
        $account = Account::create([
            'uuid' => $aggregateUuid,
            'account_name' => $event->account_name,
            'account_type_id' => $event->account_type_id,
        ]);

        $user = User::findOrFail(auth()->user()->id);

        $account->users()->save($user);
    }

    public function onMoneyAdded(MoneyAdded $event, string $aggregateUuid)
    {
        $account = Account::uuid($aggregateUuid);

        $account->balance += $event->amount;

        $account->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event, string $aggregateUuid)
    {
        $account = Account::uuid($aggregateUuid);

        $account->balance -= $event->amount;

        $account->save();
    }
}
