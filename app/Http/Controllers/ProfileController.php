<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'profile-image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB max
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile-image')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->photo_profil && Storage::disk('public')->exists('clients/profils/' . $user->photo_profil)) {
                Storage::disk('public')->delete('clients/profils/' . $user->photo_profil);
            }

            // Enregistrer la nouvelle image
            $file = $request->file('profile-image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('clients/profils', $filename, 'public');

            // Mettre à jour le profil utilisateur
            $user->photo_profil = $filename;
            $user->save();
        }

        return back()->with('success', 'Photo de profil mise à jour !');
    }

    // Suppression de la photo
    public function deletePhoto(Request $request)
    {
        $user = auth()->user();

        if ($user->photo_profil && Storage::disk('public')->exists('clients/profils/' . $user->photo_profil)) {
            Storage::disk('public')->delete('clients/profils/' . $user->photo_profil);
        }

        $user->update(['photo_profil' => null]);

        return back()->with('status', 'Photo de profil supprimée avec succès.');
    }



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
