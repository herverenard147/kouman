<?php

namespace App\Http\Controllers\Auth\Client;

use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginClientRequest;

class AuthenticatedClientController extends Controller
{
     public function __construct()
    {
        if (Auth::guard('client')->check()) {
            redirect()->route('client.index')->send();
        }
    }
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('client.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginClientRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('client.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
