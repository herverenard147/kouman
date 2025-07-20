<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginPartenaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }


       /**
     * Get custom validation messages in French.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'L\'adresse email est requise.',
            'email.email' => 'L\'adresse email doit être valide.',
            'password.required' => 'Le mot de passe est requis.',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        dd();
        $this->ensureIsNotRateLimited();

        $credentials = [
            'email' => $this->string('email'),
            'password' => $this->string('password'),
        ];

        // $partenaire = \App\Models\Partenaire::where('email', $credentials['email'])->first();

        // dd('Tentative d\'authentification', [
        //     'credentials' => $credentials,
        //     'mot_de_passe_valide' => $partenaire ? \Illuminate\Support\Facades\Hash::check($credentials['mot_de_passe'], $partenaire->mot_de_passe) : false,
        // ]);

        // dd('$credentials', $credentials);
        $test = Auth::guard('partenaire')->attempt($credentials, $this->boolean('remember'));
        // dd('Tentative d\'authentification', $test, $credentials,[
        //     'credentials' => $credentials,
        //     'mot_de_passe_valide' => $partenaire ? \Illuminate\Support\Facades\Hash::check($credentials['mot_de_passe'], $partenaire->mot_de_passe) : false,
        //     'partenaire' => $partenaire,
        // ]);

        if (! $test ){
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'error' => "L'email ou le mot de passe est incorrect.",
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {

        // dd('Méthode store attei');
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}

