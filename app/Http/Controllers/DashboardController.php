<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Models\Transaction;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        // $t = auth()->user()->activeAccounts->transactions;
        // dd($t);

        return Inertia::render('Dashboard', [
            'accounts' => auth()->user()->activeAccounts
        ]);
    }
}
