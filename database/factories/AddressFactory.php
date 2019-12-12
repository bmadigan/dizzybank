<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Domain\Addresses\Models\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street_address' => $faker->buildingNumber . ' ' . $faker->streetName,
        'secondary_address' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zipcode' => $faker->postcode,
    ];
});
