<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        // On autorise toujours pour la validation du formulaire de login
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'L’email est obligatoire.',
            'email.email' => 'L’email n’est pas valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ];
    }
}
