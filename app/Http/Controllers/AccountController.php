<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $u = auth()->user();
        $a = $u->accounts()->first();
        dd($a->state->isClosed());
    }
}
