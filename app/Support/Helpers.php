<?php

use Illuminate\Support\Carbon;

function generateAccountNumber()
{
    // A VERY Simple random number generator like so: xxx-xxxxx
    $accountNum = mt_rand(100, 999) . '-' . mt_rand(10000, 99999);

    return $accountNum;
}

/**
 * Convert money from UI into cents
 *
 * @param $amount
 * @return int|string
 */
function convertCurrencyToCents($amount)
{
    $amount = str_replace('$', '', $amount);
    $amount = str_replace(',', '', $amount);
    $amount = str_replace(' ', '', $amount);

    // If theres a . we need to account for that.
    $newAmount = explode('.', $amount);

    // No decimal places given
    if (sizeof($newAmount) == 1) {
        return $newAmount[0] . '00';
    } else {
        // Sometimes, a user could put a single decimal place
        // Eg. $11.5
        if (strlen($newAmount[1]) === 1) {
            return $newAmount[0] . $newAmount[1] . '0';
        }
    }

    return intval($newAmount[0] . $newAmount[1]);
}
