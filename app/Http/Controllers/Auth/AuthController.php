<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialUser;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout');

        $this->middleware('guest')->except('logout');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('welcome');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')
            ->scopes(config('services.github.scopes'))
            ->redirect();
    }

    /**
     * Handle the GitHub OAuth response
     */
    public function handleProviderCallback(Request $request)
    {
        if ($request->has('error')) {
            
            // Alright something went wrong ... 
            // @link https://docs.github.com/en/developers/apps/authorizing-oauth-apps#error-codes-for-the-device-flow
            
            flash('status', 'error', "We are having an issue authenticating with GitHub, please try again in a few minutes.");

            return redirect()->route('welcome');
        }

        try {
            
            $social = Socialite::driver('github')->user();

        } catch (\Exception $exception) {

            report($exception);

            flash('status', 'error', "We are having an error authenticating with GitHub, please try again in a few minutes.");

            return redirect()->route('welcome');
        }

        if ($social->email != 'wyatt.castaneda@gmail.com') {

            flash('status', 'error', "Only the site creator can authenticate with GitHub.");

            return redirect()->route('welcome');
        } 

        // Look for existing user with username
        $user = User::where('username', $social->getNickname())->first();

        if ($user === null) {

            // No user with that username exists, create new user
            $user = $this->registerNewUser($social);

            flash('status', 'success', "Hello {$user->name}, your account has been created!");
        } else {
    
            // User exists just a normal update and login
            $user = $this->updateUser($user, $social);

            flash('status', 'success', "Welcome back {$user->name}");
        }

        Auth::login($user, true);

        return redirect()->route('welcome');
    }

    protected function registerNewUser(SocialUser $social): User
    {
        $user = User::create([
            'name' => $social->name,
            'username' => Str::slug($social->nickname),
            'email' => $social->email,
            'email_verified_at' => null,
            'avatar' => $social->avatar,
            'auth_provider' => 'github',
            'auth_token' => $social->token,
            'bio' => $social->user['bio'],
            'blog' => $social->user['blog'],
            'meta' => json_encode($social->user),
        ]);

        return $user;
    }

    protected function updateUser(User $user, SocialUser $social): User
    {
        $user->update([
            'name' => $social->name,
            'email' => $social->email,
            'avatar' => $social->avatar,
            'bio' => $social->user['bio'],
            'blog' => $social->user['blog'],
            'auth_token' => $social->token,
            'meta' => json_encode($social->user),
        ]);

        return $user;
    }
}
