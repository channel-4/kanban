<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToGoogle()
    {
        // Google へのリダイレクト
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback()
    {
        $google_user = Socialite::driver('google')->stateless()->user();
        
         // email が合致するユーザーを取得
        $user = User::where('email', $google_user->email)->first();
        
        // 見つからなければ新しくユーザーを作成
        if ($user === null) {
            $user = $this->createUserByGoogle($google_user);
        }
        
        // ログイン処理
        \Auth::login($user, true);
        return redirect('/');
    }
    
    public function createUserByGoogle($google_user)
    {
        $user = User::create([
            'name'  => $google_user->name,
            'email' => $google_user->email,
        ]);
        return $user;
    }
}
