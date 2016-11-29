@extends('layouts.app')

@section('head-script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector:'#article', 
            height: 500,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true
        });
    </script>
@endsection

@section('content')
<main class="container">
    <section class="well">
        <form action="{{ route('article.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="label-control">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Overview</label>
                <textarea name="overview" class="form-control">{{ old('overview') }}</textarea>
            </div>
            <div class="form-group">
                <textarea id="article" name="body" class="form-control">{{ old('body') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </section>
</main>
@endsection
