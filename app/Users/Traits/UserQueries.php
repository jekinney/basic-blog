<?php

namespace App\Users\Traits;

trait UserQueries
{
	public function createFromSocial($social)
	{
		$user = $this->where('email', $social->email)->first();
		if(!$user) {
			$user = $this->create([
				'name' => $social->name,
				'email' => $social->email,
				'active' => 1
			]);
		}

		return $user->id;
	}
}