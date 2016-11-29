<?php

namespace App\Blog\Models;

use App\Blog\Traits\ArticleQueries;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ArticleQueries;
    
    protected $fillable = [
    	'category_id',
		'user_id',
        'author_name',
        'header_image',
		'slug',
		'title',
		'overview',
		'body',
		'draft',
		'publish_at',
	];

    protected $casts = [
    	'draft' => 'boolean',
    ];

    protected $dates = [
    	'publish_at',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
    	return $this->belongsTo(\App\User::class, 'user_id', 'id')->select('id', 'name');
    }
}
