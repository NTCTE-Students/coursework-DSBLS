@extends('layouts.app')

@section('title', $user->name . "'s Blog")

@section('content')
<body>
    <div class="container mt-5">
        <h1>{{ $user->name }}'s Blog</h1>
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->format('d.m.Y H:i') }}</h6>
                    <p class="card-text">{{ $post->content }}</p>
                    @if ($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="Изображение поста">
                    @endif
                    @if ($post->video_path)
                        <video src="{{ asset('storage/' . $post->video_path) }}" class="img-fluid" controls></video>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>
@endsection
