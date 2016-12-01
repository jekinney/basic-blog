<?php

namespace App\Users\Traits;

trait SocialQueries
{
	public function handle($social, $provider)
	{
		$this->{$provider}($social);
	}

	protected function facebook($social)
	{
		$facebook = [
			'provider' => 'facebook',
			'provider_user_id' => $social->id,
			'name' => $social->name,
			'email' => $social->email,
			'nickname' => null,
			'avatar_url' => $social->avatar,
			'profile_url' => $social->profileUrl,
		];
		return $this->updateOrCreate($facebook);
	}

	protected function github($social)
	{
		$user = $social->user;
		$github = [
			'provider' => 'github',
			'provider_user_id' => $user['id'],
			'name' => $user['login'],
			'email' => $user['email'],
			'nickname' => null,
			'avatar_url' => $user['avatar_url'],
			'profile_url' => $user['url'],
		];
		return $this->updateOrCreate($github);
	}

	protected function google($social)
	{
		$google = [
			'provider' => 'google',
			'provider_user_id' => $social->id,
			'name' => $social->name,
			'email' => $social->email,
			'nickname' => null,
			'avatar_url' => $social->avatar,
			'profile_url' => $social->user['url'],
		];
		return $this->updateOrCreate($google);
	}

	protected function updateOrCreate(array $data)
	{
		$exists = $this->where('provider', $data['provider'])
			->where('provider_user_id', $data['provider_user_id'])
			->first();

		if($exists) {
			$exists->update($data);
		} else {
			$exists = $this->create($data);
		}
		return auth()->loginUsingId($exists->user_id, true);
	}
}