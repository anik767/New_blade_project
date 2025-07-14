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

        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Login successful');
    }

    /**
     * Log the user out and destroy the session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // ✅ Logs the user out
        $request->session()->invalidate(); // ✅ Invalidates session
        $request->session()->regenerateToken(); // ✅ Regenerates CSRF token

        // ✅ Redirects to login page with a flash message for Notyf toast
        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
