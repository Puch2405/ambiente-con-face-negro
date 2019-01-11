<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('FACEBOOK')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('FACEBOOK')->user();

        return ($user->getAvatar());
    }
}
