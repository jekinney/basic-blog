@extends('layouts.app')

@section('content')
<main class="container">
    @include('article.partials.list')
    <footer class="text-center">
        {{ $articles->links() }}
    </footer>
</main>
@endsection
