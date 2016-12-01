<?php

namespace App\Users\Observers;

use App\Users\Models\Profile;

class Profiles
{
	/**
     * Listen to the Profile creating event.
     *
     * @param  Profile  $profile
     * @return void
     */
    public function creating(Profile $profile)
    {
        $profile->avatar = 'https://www.gravatar.com/avatar/'.md5($profile->gravatar_email);
    }

    /**
     * Listen to the Profile updating event.
     *
     * @param  Profile  $profile
     * @return void
     */
    public function updating(Profile $article)
    {
    	$profile->avatar = 'https://www.gravatar.com/avatar/'.md5($profile->gravatar_email);
    }
}