<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    public function edit()
    {
        return Inertia::render('User/Edit');
    }

    public function update()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = auth()->user();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->save();

        return Redirect::route('user.profile.edit')->with('success', 'Your Profile Has Been Updated!');
    }

    public function password(Request $request)
    {
        request()->validate([
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return Redirect::route('user.profile.edit')->with('success', 'Your Password Has Been Updated!');
    }
}
