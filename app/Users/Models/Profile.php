<?php

namespace App\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'user_id',
        'name',
    	'avatar',
        'gravatar_email',
    	'use_gravatar',
    ];

    protected $casts = [
    	'use_gravatar' => 'boolean',
    ];

    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
