@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<body>
    <div class="container mt-5">
        <h1>Create Post</h1>
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" placeholder="Текст поста" required></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="file" name="video" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Выложить пост</button>
        </form>
    </div>
</body>
@endsection