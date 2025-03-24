<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    private function allowRegistration(): bool
    {
        return User::count() === 0;
    }

    /**
     * Show the registration page.
     */
    public function create(): Response|RedirectResponse
    {
        if (!$this->allowRegistration()) {
            return redirect('/');
        }

        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$this->allowRegistration()) {
            return redirect('/');
        }

        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|lowercase|email|max:50|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return to_route('dashboard');
    }
}
