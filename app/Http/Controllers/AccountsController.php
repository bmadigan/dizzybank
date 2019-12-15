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
        //dd(auth()->user()->accounts);

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
}
