<?php

namespace App\Domain\Accounts\Models;

use App\Support\Model;
use App\Domain\Accounts\Events\MoneyAdded;
use App\Domain\Accounts\Events\MoneySubtracted;
use App\Domain\Payments\Events\PaymentMade;
use App\Domain\Payments\Models\Payee;
use Dyrynda\Database\Support\GeneratesUuid;

class Transaction extends Model
{
    use GeneratesUuid;

    protected $with = ['account'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    public function account()
    {
        return $this->belongsTo(Account::class)->active();
    }

    public static function moneyAdded(MoneyAdded $event, $uuid)
    {
        $account = Account::uuid($uuid);
        $type = self::getTransactionType($event);

        self::create([
            'account_id' => $account->id,
            'description' => auth()->user()->name . ' deposited money.',
            'amount' => $event->amount,
            'balance' => $account->balance,
            'type' => $type,
        ]);
    }

    public static function moneySubtracted(MoneySubtracted $event, $uuid)
    {
        $account = Account::uuid($uuid);
        $type = self::getTransactionType($event);

        self::create([
            'account_id' => $account->id,
            'description' => auth()->user()->name . ' withrew money.',
            'amount' => $event->amount,
            'balance' => $account->balance,
            'type' => $type,
        ]);
    }

    public static function makePayment(PaymentMade $event, $uuid)
    {
        $account = Account::findOrFail($event->accountId);
        $account->paymentMadeFromAccount($event->amount);
        $payee = Payee::findOrFail($event->payeeId);
        $type = self::getTransactionType($event);

        self::create([
            'account_id' => $event->accountId,
            'description' => auth()->user()->name . ' made a payment to ' . $payee->payee_name,
            'amount' => $event->amount,
            'balance' => $account->balance,
            'type' => $type,
        ]);
    }

    public function displayAmount()
    {
        if ($this->type === 'MoneySubtracted' || $this->type === 'MoneyTransferredFrom' || $this->type === 'PaymentMade') {
            return '- ' . currency($this->amount);
        }

        return '+ ' . currency($this->amount);
    }

    protected static function getTransactionType($event)
    {
        return class_basename($event);
    }
}
