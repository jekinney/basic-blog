<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class UserComposer
{
	public function compose(View $view)
	{
		$view->with('user', auth()->check()? auth()->user():false);
		$view->with('is_author', auth()->check()? auth()->user()->author:false);
	}
}
