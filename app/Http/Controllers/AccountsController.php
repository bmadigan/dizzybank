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
    public function show(Request $request)
    {
        //dd(auth()->user()->accounts);

        return Inertia::render('Accounts/Show', [
            'accounts' => auth()->user()->accounts
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
