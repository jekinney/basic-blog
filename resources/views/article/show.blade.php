@extends('layouts.app')

@section('content')
<main class="container">
    <section class="well">
        <header>
            <h1>{{ $article->title }}</h1>
            <ul class="list-inline">
                <li>Author: {{ $article->author_name }}</li>
                <li>Published: {{ $article->publish_at->diffForHumans() }}</li>
            </ul>
        </header>
        <article>
            {!! $article->body !!}
        </article>
        @if($is_author)
            <footer class="text-right">
                <a href="{{ route('article.edit', $article) }}" class="btn btn-danger btn-xs">
                    Edit
                </a>
            </footer>
        @endif
    </section>
</main>
@endsection
