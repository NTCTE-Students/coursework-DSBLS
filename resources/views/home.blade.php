@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <h1>Home Page</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Создать пост</a>
        
        @if($posts->isEmpty())
            <p>Нет постов для отображения.</p>
        @else
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->format('d.m.Y H:i') }}</h6>
                        <p class="card-text">{{ $post->content }}</p>
                        @if ($post->image)
                            <img src="{{ asset('images/' . $post->image) }}" alt="Изображение поста">
                        @endif
                        @if ($post->video_path)
                            <video src="{{ asset('storage/' . $post->video_path) }}" class="img-fluid" controls></video>
                        @endif
                    </div>
                    
                    @foreach ($post->comments as $comment)
                        <div class="card mb-2">
                            <div class="card-body">
                                <p><strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at->format('d.m.Y H:i') }})</p>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Форма для добавления комментария -->
                    <form method="POST" action="{{ route('comments.store', ['postId' => $post->id]) }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="content" class="form-control" placeholder="Оставить комментарий">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
