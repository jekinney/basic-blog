<?php

namespace App\Users\Observers;

use App\Users\Models\User;

class Users
{
	/**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->name_slug = $this->generateSlug($user->name);
    }

    /**
     * Listen to the User updating event.
     *
     * @param  User  $user
     * @return void
     */
    public function updating(User $user)
    {
        $user->name_slug = $this->generateSlug($user->name);
    }

    protected function generateSlug($slugable)
    {
        $slug = str_slug($slugable);
        if(User::where('name_slug', $slug)->first())
        {
            return $this->generateSlug($slugable.'-'.\Carbon\Carbon::now()->toDateString());
        }
        return $slug;
    }
}