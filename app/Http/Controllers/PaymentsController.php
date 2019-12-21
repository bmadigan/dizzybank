<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Domain\Payments\Aggregates\PaymentAggregate;
use App\Domain\Payments\Requests\MakePaymentRequest;

class PaymentsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user()->activeAccounts;
        $payees = auth()->user()->payees;
        $payments = auth()->user()->payments;

        return Inertia::render('Payments/Index', [
            'accounts' => $accounts,
            'payments' => $payments,
            'payees' => $payees
        ]);
    }

    public function store(MakePaymentRequest $request)
    {
        $newUuid = Str::uuid()->toString();

        PaymentAggregate::retrieve($newUuid)
            ->makePayment(convertCurrencyToCents(request()->amount), request()->accountId, request()->payeeId)
            ->persist();

        return Redirect::back()->with('success', 'Your payment has been recorded.');
    }
}
