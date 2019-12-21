<?php

namespace App\Domain\Payments\Models;

use App\Support\Model;
use App\Domain\Accounts\Models\Account;
use App\Domain\Users\Models\User;
use Dyrynda\Database\Support\GeneratesUuid;


class Payment extends Model
{
    use GeneratesUuid;

    protected $with = ['account', 'user', 'payee'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }

    public static function addPayment($event, $uuid)
    {
        self::create([
            'account_id' => $event->accountId,
            'payee_id' => $event->payeeId,
            'user_id' => auth()->user()->id,
            'amount' => $event->amount,
        ]);
    }
}
