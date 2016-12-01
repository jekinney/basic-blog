<?php

namespace App\Users\Models;

use App\Users\Traits\SocialQueries;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	use SocialQueries;
	
    protected $fillable = [
    	'user_id',
		'provider',
		'provider_user_id',
		'name',
		'email',
		'nickname',
		'avatar_url',
		'profile_url',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
