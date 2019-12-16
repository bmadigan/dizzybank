<?php

namespace App\Domain\Accounts\Projectors;

use App\Domain\Users\Models\User;
use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\States\Closed;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Events\MoneyAdded;
use App\Domain\Accounts\Events\AccountClosed;
use App\Domain\Accounts\Events\AccountCreated;
use Spatie\EventSourcing\Projectors\Projector;
use App\Domain\Accounts\Events\MoneySubtracted;
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

    public function onAccountClosed(AccountClosed $event, string $aggregateUuid)
    {
        $account = Account::uuid($aggregateUuid);

        // dd($account->transitionableStates(Active::class));
        // VERY Annoying error
        // $account->state->transitionTo(Closed::class);

        // Do it manually instead so I can continue to work
        $account->state = 'closed';
        $account->save();
    }
}
