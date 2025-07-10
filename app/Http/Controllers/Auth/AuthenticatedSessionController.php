<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // checks user credentials

        $request->session()->regenerate(); // prevent session fixation

        return redirect()->intended(route('admin.dashboard')); // redirect after login
    }

    /**
     * Log the user out and destroy the session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // logout the user

        $request->session()->invalidate(); // invalidate the session
        $request->session()->regenerateToken(); // regenerate CSRF token

        return redirect('/'); // go to home page
    }
}
