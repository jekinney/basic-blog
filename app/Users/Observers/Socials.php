<?php

namespace App\Users\Observers;

use App\Users\Models\User;
use App\Users\Models\Social;

class Socials
{
	protected $user;

	function __construct(user $user)
	{
		$this->user = $user;
	}

	/**
     * Listen to the Social creating event.
     *
     * @param  Social  $social
     * @return void
     */
    public function creating(Social $social)
    {
        $social->user_id = $this->user->createFromSocial($social);
    }
}