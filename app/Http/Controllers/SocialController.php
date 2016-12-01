<?php

namespace App\Http\Controllers;

use Socialite;
use App\Users\Models\Social;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Social $social)
    {
    	$social->handle(Socialite::driver($provider)->user(), $provider);

    	return redirect()->route('profile.edit', auth()->user());
    }
}
