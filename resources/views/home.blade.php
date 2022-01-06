@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <img src="/storage/avatars/{{ Auth::user()->avatar }}" class="card-img-top" alt="Avatar">
                <div class="card-body">
                  <h5 class="card-title">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h5>
                  <p class="card-text">{{ Auth::user()->bio }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h1 class="display-4">
                        {{ __('Welcome ' . Auth::user()->first_name . " " . Auth::user()->last_name) }}
                    </h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident deleniti, perspiciatis, sapiente hic fuga quod iusto quo recusandae voluptate pariatur cumque nam, quos omnis cum corrupti fugit ipsa velit quisquam!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
