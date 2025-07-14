<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Cookie;

class ClearInvalidSessionCookie
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Si la session est vide et qu'on a un cookie Laravel, on le supprime
        if (!Session::has('_token') && $request->hasCookie(config('session.cookie'))) {
            $response->headers->setCookie(
                Cookie::create(config('session.cookie'))
                    ->withValue('')
                    ->withExpires(0)
                    ->withPath(config('session.path', '/'))
                    ->withDomain(config('session.domain'))
                    ->withSecure(config('session.secure', false))
                    ->withHttpOnly(true)
            );
        }

        return $response;
    }
}
