@extends('layout')

@section('title', ucfirst(strtolower(__($post->title))))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 bg-white p-5 shadow rounded mx-auto">

            <h1>{{ $post->title }}</h1>

            <a href="https://warframe.com/news/{{ $post->url }}" target="_blank">
                <img src="../storage/post/{{ $post->image_path }}" class="img-responsive w-50">
            </a>

            <p class="text-secondary">{{ $post->description }}</p>

            <p class="text-black-50">{{ $post->created_at->diffForHumans() }}</p>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('home') }}">@lang("Back")</a>
                @auth
                    <div class="btn-group">
                        <a class="btn btn-warning" href="{{ route('post.edit', $post) }}">@lang('Edit')</a>
                        <a class="btn btn-danger text-white" href="#" onclick="document.getElementById('delete-post').submit()">@lang('Delete')</a>
                    </div>
                    <form class="d-none" id="delete-post" method="POST" action="{{ route('post.destroy', $post) }}">
                        @csrf @method('DELETE')
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>

@endsection