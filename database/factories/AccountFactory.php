<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'account_name' => $faker->creditCardType . ' Account',
        'state' => Active::class,
    ];
});
