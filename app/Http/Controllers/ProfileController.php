<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

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

    /**
     * Update the user's avatar.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        // Validation de l'image sans passer par une form request
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048'],
        ]);

        // Si l'image est valide, on la sauvegarde
        if ($request->hasFile('avatar')) {
            $user = $request->user();
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar_path = $path;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
    }

    /**
     * Display the specified user's profile.
     */
    public function show(User $user): View
    {
        // Les articles publiés par l'utilisateur (dans votre cas, vous pouvez remplacer 'articles' par 'spartans' si c'est pertinent)
        $spartans = $user->spartans()
            ->withCount('comments')
            ->orderByDesc('created_at')
            ->get();

        // Les commentaires de l'utilisateur
        $comments = $user->comments()
            ->orderByDesc('created_at')
            ->get();

        return view('profile.show', [
            'user' => $user,
            'spartans' => $spartans,
            'comments' => $comments,
        ]);
    }
}
