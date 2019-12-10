<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    $accountTypeIDs = DB::table('account_types')->pluck('id');

    return [
        'account_name' => $faker->creditCardType . ' Account',
        'account_type_id' => $faker->randomElement($accountTypeIDs),
        'state' => Active::class,
    ];
});
