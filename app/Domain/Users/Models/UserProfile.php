<?php

namespace App\Domain\Users\Models;

use App\Support\Model;
use App\Domain\Addresses\Models\Address;

class UserProfile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
