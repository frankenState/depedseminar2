@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4">New Post</h1>

            @if (session('status'))
                <div class="alert alert-{{ session('status')['type'] }}">
                    {{ session('status')['message'] }}
                </div>
            @endif
            <form action="{{ route('posts.save') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="title">{{ __('Title') }}</label>
                    <input id="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="body">{{ __('Post Body') }}</label>
                    <textarea rows="6" cols="10" id="body" type="text" placeholder="Post Body" class="form-control @error('body') is-invalid @enderror" name="body" required autocomplete="body" autofocus></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection