<?php

namespace App\Http\Controllers\Auth\Client;

use Illuminate\Auth\Events\Registered;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginClientRequest;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
        return view('auth.client.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginClientRequest $request): JsonResponse
    {
        try {
            $authResult = $request->authenticate();

    logger($authResult);
            // $request->session()->regenerate();

            $user = $authResult['user'];
            $userType = $authResult['userType'];

            // Génération d’un token (via Sanctum par ex.)
            $token = $user->createToken($userType . '-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie',
                'user' => $user,
                'token' => $token,
                'user_type' => $userType
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Identifiants invalides',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erreur connexion client', ['exception' => $e]);
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        $guards = ['client', 'partenaire', 'admin'];
        $loggedOut = null;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                $loggedOut = $guard;
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status' => 'success',
            'message' => $loggedOut 
                ? ucfirst($loggedOut) . ' déconnecté avec succès.'
                : 'Aucun utilisateur connecté.',
            'guard' => $loggedOut,
        ]);
    }
}
