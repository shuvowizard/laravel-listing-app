<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Profile/Edit', [
            'user' => $request->user(),
        ]);
    }

    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-\']+$/u',],
            'email' => ['required', 'lowercase', 'email', 'string', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],

        ], [
            'name.regex' => 'Name can only contain letters, spaces, hyphens and apostrophes.',
        ]);

        $user = $request->user();

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->back();
    }

    public function updatePassword(Request $request) {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password', 'string',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         $request->user()->update([
            'password' => $validated['password'],
        ]);

        return back();
    }

    public function destroy(Request $request) {
         $request->validate([
            'password' => ['required', 'current_password', 'min:8',],
        ]);
        
        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
