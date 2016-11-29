<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog\Models\Article;

class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $articles = $article->newest(5);

        return view('home', compact('articles'));
    }
}
