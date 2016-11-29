<?php

namespace App\Blog\Traits;

use Carbon\Carbon;

trait ArticleQueries
{
	public function newest($amount)
	{
		return $this->publicBaseQuery()
			->limit($amount)
			->get();
	}

	public function index($amount = 5)
	{
		return $this->publicBaseQuery()
			->paginate($amount);
	}

	public function show()
	{
		return $this;
	}

	public function addNew($request)
	{
		$request = array_add($request->all(), 'user_id', auth()->id());
		return $this->create($request);
	}

	public function addUpdate($id, $request)
	{
		$article = $this->find($id);
		$article->update($request->all());
		return $article;
	}

	protected function publicBaseQuery()
	{
		return $this->where('draft', 0)
			->where('publish_at', '<', Carbon::now())
			->orderBy('publish_at', 'desc')
			->select('author_name', 'slug', 'title', 'overview', 'publish_at');
	}
}