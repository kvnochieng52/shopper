<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function google()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->_registerorLoginUser($user, $request);
        return redirect()->route('home');
    }


    public function facebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }


    public function handleFacebookCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $this->_registerorLoginUser($user, $request);
        return redirect()->route('home');
    }



    protected function _registerOrLoginUser($data, Request $request)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }


        if (Auth::login($user)) {
        } else {
            return back();
        }
    }
}
