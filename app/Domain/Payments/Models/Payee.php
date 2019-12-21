<?php

namespace App\Domain\Payments\Models;

use App\Support\Model;
use App\Domain\Users\Models\User;
use Dyrynda\Database\Support\GeneratesUuid;

class Payee extends Model
{
    use GeneratesUuid;

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
}
