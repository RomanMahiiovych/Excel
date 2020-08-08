<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        //send the user's request to github
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        //get oauth request back from  github to authenticate user
        $user = Socialite::driver('github')->user();

//        dd($user->getNickname());
        $user = User::firstOrCreate(
            [
                'email' => $user->email
            ],
            [
                'name' => $user->getNickname(),
                'password' => Hash::make(Str::random(24))
            ]
        );

        Auth::login($user, true);
        return redirect('/');
    }
}
