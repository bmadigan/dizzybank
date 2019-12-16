<?php

namespace App\Domain\Accounts\Models;

use App\Support\Model;
use App\Domain\Users\Models\User;
use Spatie\ModelStates\HasStates;
use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\States\Closed;
use App\Domain\Accounts\States\Expired;
use Dyrynda\Database\Support\GeneratesUuid;
use App\Domain\Accounts\States\AccountState;

class Account extends Model
{
    use HasStates, GeneratesUuid;
    //$payments = Payment::whereState('state', [Pending::class, Paid::class]);
    //$payments = Payment::whereNotState('state', [Canceled::class]);

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    protected function registerStates(): void
    {
        $this->addState('state', AccountState::class)
            ->default(Active::class)
            ->allowTransition(Active::class, Closed::class);
        //->allowTransition(Active::class, Expired::class)
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            $account->account_number = generateAccountNumber();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }

    public function account_type()
    {
        return $this->belongsTo(AccountType::class);
    }
}
