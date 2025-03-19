<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewUserEmail;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Http\Request;
use App\Jobs\SendNewUserEmail;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InitialController extends Controller
{
    //

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You have successfully logged out.');
    }
    public function login(Request $request)
    {
        $outgoingFields = $request->validate(
            [

                'username' => ['required'],
                'password' => ['required']
            ]

        );
        if (
            auth()->attempt(
                [
                    'username' => $outgoingFields['username'],
                    'password' => $outgoingFields['password']
                ]
            )
        ) {
            $request->session()->regenerate();
            return redirect('/homepage')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/login')->with('failure', 'Incorrect login attempt.');
        }
    }
    public function register(Request $request)
    {
        $incomingFields = $request->validate(
            [

                'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'confirmed']
            ]

        );
        $user = User::create($incomingFields);
        //auth()->login($user);
        
        dispatch(new SendNewUserEmail([
            'name' => $user->username,
            'email' => $user->email
        ]));

        // Commenting this out because we have are sending mail 
        // through Job SendNewUserEmail, for async.
        // Mail::to($user->email)->send(new NewUserEmail([
        //     'name' => $user->username
        // ]));
        return redirect('/login')->with('success', 'Thank you for creating an account.');

    }
    public function showLogin()
    {
        return view("login");
    }
    public function showLandingPage()
    {
        return view("landing");
    }
}
