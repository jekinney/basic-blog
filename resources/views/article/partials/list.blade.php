@foreach($articles as $article)
    <section class="well">
        <header>
            <h2>{{ $article->title }}</h2>
            <ul class="list-inline">
                <li>Author: {{ $article->author_name }}</li>
                <li>Published: {{ $article->publish_at->diffForHumans() }}</li>
            </ul>
        </header>
        <article>
            {!! $article->overview !!}
        </article>
        <footer class="row">
            <div class="col-xs-12">
                <a href="{{ route('article.show', $article) }}" class="btn btn-primary btn-xs pull-right">Read More</a>
                @if($is_author)
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-danger btn-xs pull-left">Edit</a>
                @endif
            </div>
        </footer>
    </section>
@endforeach