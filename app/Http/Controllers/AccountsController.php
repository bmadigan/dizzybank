<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;
use Illuminate\Support\Facades\Redirect;
use App\Domain\Accounts\Aggregates\AccountAggregate;
use App\Domain\Accounts\Resources\TransactionResource;

class AccountsController extends Controller
{
    public function show(Account $account)
    {
        $transactions = TransactionResource::collection($account->transactions);

        return Inertia::render('Accounts/Show', [
            'account' => $account,
            'isActive' => $account->state->isActive(),
            'accountType' => $account->account_type,
            'transactions' => $transactions,
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

        // Deposit Some Money
        if (request()->deposit_amount) {
            $aggregateRoot->addMoney(convertCurrencyToCents(request()->deposit_amount), $account->id);
            $aggregateRoot->persist();

            return Redirect::back()->with('success', 'Money has been deposited');
        }

        // Widthdraw some Money
        if (request()->withdraw_amount) {
            $aggregateRoot->subtractMoney(convertCurrencyToCents(request()->withdraw_amount));
            $aggregateRoot->persist();

            return Redirect::back()->with('success', 'Money has been withdrawn');
        }

        // Update Account Name
        if (request()->account_name) {
            request()->validate(['account_name' => 'bail|required']);

            $account->account_name = request()->account_name;
            $account->save();

            return Redirect::back()->with('success', 'Account Name Updated!');
        }

        // Close Account
        if (request()->isClosed == '1') {
            $aggregateRoot = AccountAggregate::retrieve($account->uuid);
            $aggregateRoot->closeAccount();
            $aggregateRoot->persist();

            return Redirect::route('dashboard')->with('success', 'The account has been closed.');
        }
    }
}
