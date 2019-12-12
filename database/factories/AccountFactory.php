<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use App\Domain\Accounts\States\Active;
use App\Domain\Accounts\Models\Account;

$factory->define(Account::class, function (Faker $faker) {
    $accountTypeIDs = DB::table('account_types')->pluck('id');

    return [
        'account_name' => $faker->creditCardType . ' Account',
        'account_type_id' => $faker->randomElement($accountTypeIDs),
        'state' => Active::class,
    ];
});
