<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Domain\Accounts\Models\Account;

class AccountsController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('Accounts/Show');
    }
}
