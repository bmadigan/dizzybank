<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use App\Domain\Accounts\Models\Transaction;

class TransactionsExportController extends Controller
{
    public function __invoke()
    {
        $transactions = auth()->user()->transactions;

        $transactionCsv = SimpleExcelWriter::streamDownload('transactions.csv');

        $transactions->each(function (Transaction $transaction) use ($transactionCsv) {
            $transactionCsv->addRow($transaction->toArray());
        });

        $transactionCsv->toBrowser();
    }
}
