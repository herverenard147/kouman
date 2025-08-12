<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginAdminRequest; // Il faudra créer cette Request spécifique à l'admin

class AuthenticatedAdminController extends Controller
{
    public function __construct()
    {
        // Si déjà connecté en tant qu'admin → rediriger vers dashboard
        if (Auth::guard('admin')->check()) {
            redirect()->route('admin.dashboard')->send();
        }
    }

    /**
     * Affiche la vue de connexion admin.
     */
    public function create(): View
    {
        return view('auth.admin.login');
    }

    /**
     * Gère la tentative de connexion admin.
     */
    public function store(LoginAdminRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l’admin.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
