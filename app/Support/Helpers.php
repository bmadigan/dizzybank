<?php

use Illuminate\Support\Carbon;

function generateAccountNumber()
{
    // A VERY Simple random number generator like so: xxx-xxxxx
    $accountNum = mt_rand(100, 999) . '-' . mt_rand(10000, 99999);

    return $accountNum;
}
