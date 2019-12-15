<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;
use Illuminate\Support\Facades\Redirect;
use App\Domain\Accounts\Aggregates\AccountAggregate;

class AccountsController extends Controller
{
    public function show(Account $account)
    {
        return Inertia::render('Accounts/Show', [
            'account' => $account,
            'accountType' => $account->account_type,
        ]);
    }

    public function store()
    {
        $newUuid = Str::uuid()->toString();

        AccountAggregate::retrieve($newUuid)
            ->createAccount(request()->accountName, request()->accountTypeId)
            ->persist();

        return Redirect::route('dashboard')->with('success', 'Your Account Has Been Created!');
    }

    public function update(Account $account)
    {
        $aggregateRoot = AccountAggregate::retrieve($account->uuid);

        if (request()->deposit_amount) {
            $aggregateRoot->addMoney(convertCurrencyToCents(request()->deposit_amount));
            $aggregateRoot->persist();

            return Redirect::back()->with('success', 'Money has been deposited');
        }

        if (request()->withdraw_amount) {
            $aggregateRoot->subtractMoney(convertCurrencyToCents(request()->withdraw_amount));
            $aggregateRoot->persist();

            return Redirect::back()->with('success', 'Money has been withdrawn');
        }
    }
}
