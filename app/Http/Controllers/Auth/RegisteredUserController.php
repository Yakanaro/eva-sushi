<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
//            'phone' => ['required', 'string', 'unique:users']
            'phone' => ['required', 'string', 'unique:users'],
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::where('phone', $request->phone)->first();
        if($user)
        {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }

        $user = User::create([
            'phone' => $request->phone,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
