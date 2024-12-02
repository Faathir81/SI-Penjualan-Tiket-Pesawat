<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentification()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            $teamEmails = [
                'zidan.work99@gmail.com',
                'zahrajanearnc@gmail.com',
                'faathirnugroho13@gmail.com'
            ];

            if ($user) {
                if (in_array($googleUser->email, $teamEmails)) {
                    $user->assignRole('teamIT');
                    Auth::login($user);
                    return redirect()->route('team');
                } else {
                    $user->assignRole('user');
                    Auth::login($user);
                    return redirect()->route('dashboard');
                }
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('password'),
                    'google_id' => $googleUser->id,
                ]);

                if (in_array($googleUser->email, $teamEmails)) {
                    $user->assignRole('teamIT');
                    Auth::login($user);
                    return redirect()->route('team');
                } else {
                    $user->assignRole('user');
                    Auth::login($user);
                    return redirect()->route('dashboard');
                }
            }
        } catch (Exception $e) {
            return redirect()->route('auth.google')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
