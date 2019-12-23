<?php

namespace App\Domain\Users\Models;

use App\Domain\Payments\Models\Payee;
use App\Domain\Payments\Models\Payment;
use App\Domain\Accounts\Models\Account;
use App\Domain\Accounts\Models\Transaction;
use App\Domain\Addresses\Models\Address;
use Illuminate\Notifications\Notifiable;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class User extends Authenticatable
{
    use Notifiable, GeneratesUuid, HasRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    public function activeAccounts()
    {
        return $this->belongsToMany(Account::class)->active();
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }

    public function payees()
    {
        return $this->hasMany(Payee::class)->orderBy('payee_name');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('created_at', 'DESC');
    }

    public function transactions()
    {
        return $this->hasManyDeep(
            Transaction::class,
            ['account_user', Account::class]
        )
            ->orderBy('created_at', 'DESC')
            ->where('accounts.state', 'active');
    }

    public function lastestTransactions($limit = 10)
    {
        return $this->transactions->take($limit);
    }
}
