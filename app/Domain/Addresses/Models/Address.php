<?php

namespace App\Domain\Addresses\Models;

use App\Support\Model;
use App\Domain\Users\Models\User;
use Dyrynda\Database\Support\GeneratesUuid;

class Address extends Model
{
    use GeneratesUuid;

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
