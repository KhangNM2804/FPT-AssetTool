<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftLoginController extends Controller
{
    public function redirectToAzure()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleAzureCallback()
    {
        $user = Socialite::driver('azure')->user();
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user in your database
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->save();
            $newUser->assignRole('teacher');
            // Log in the new user
            Auth::login($newUser);
        }
        return redirect('/');
    }
   
}
