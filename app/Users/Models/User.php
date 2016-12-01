<?php

namespace App\Users\Models;

use App\Users\Traits\UserQueries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserQueries;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name_slug';
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    public function profile()
    {
        return $this->hasOne(\App\Users\Models\Profile::class);
    }

    public function articles()
    {
        return $this->hasMany(\App\Blog\Models\Article::class);
    }

    public function updateOrCreate($request)
    {
        $this->update(['email' => $request->email]);
        if($this->profile) {
            $this->profile()->update(['gravatar_email' => $request->gravatar]);
        }  else {
            $this->profile()->create([
                'name' => $this->name,
                'gravatar_email' => $request->gravatar,
            ]);
        }
    }
}
