<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Models\Transaction;
use App\Domain\Accounts\Resources\TransactionResource;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $transactions = TransactionResource::collection(auth()->user()->lastestTransactions(10));

        return Inertia::render('Dashboard', [
            'accounts' => auth()->user()->activeAccounts,
            'transactions' => $transactions,
        ]);
    }
}
