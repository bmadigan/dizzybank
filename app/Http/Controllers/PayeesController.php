<?php

namespace App\Http\Controllers;

use App\Domain\Payments\Models\Payee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PayeesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payee_name' => 'required',
        ]);

        Payee::create([
            'payee_name' => request()->payee_name,
            'user_id' => auth()->user()->id,
        ]);

        return Redirect::back()->with('success', 'Your Payee has been added.');
    }
}
