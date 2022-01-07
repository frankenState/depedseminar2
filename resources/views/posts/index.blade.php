@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4">Welcome to Posts Page</h1>
            @if (session('status'))
                <div class="alert alert-{{ session('status')['type'] }}">
                    {{ session('status')['message'] }}
                </div>
            @endif
            
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                <div class="media">
                    <img src="/storage/avatars/{{ $post->user->avatar }}" class="mr-3" alt="avatar" width="5%" style="border-radius:4px">
                    <div class="media-body">
                      <h5 class="mt-0">{{ $post->title }}</h5>
                      {{ $post->body }}
                      <small>{{ $post->created_at }} posted by {{ "{$post->user->first_name} {$post->user->last_name}" }}</small>
                    </div>
                  </div>
                  <hr class="mb-2">
                @endforeach
            @else
                <p class="lead">Post table is empty.</p>
            @endif

        </div>
    </div>
</div>
@endsection