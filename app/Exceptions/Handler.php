<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        // Redirection personnalisée selon le guard
        $guard = $exception->guards()[0] ?? null;

        switch ($guard) {
            case 'partenaire':
                $login = route('partenaire.login');
                break;
            case 'client':
                $login = route('client.login');
                break;
            case 'admin':
                $login = route('admin.login');
                break;
            default:
                $login = route('login');
                break;
        }

        return redirect()->guest($login);
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    // public function render($request, Throwable $exception)
    // {
    //     if ($this->isHttpException($exception)) {
    //         $status = $exception->getStatusCode();

    //         if (view()->exists("errors.{$status}")) {
    //             return response()->view("errors.{$status}", [], $status);
    //         }
    //     }

    //     return parent::render($request, $exception);
    // }
}
