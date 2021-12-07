@extends('layout')

@section('carousel')
@include('partials.carousel')
@endsection

@section('title', __('Home'))

@section('content')
<div class="container px-5 py-2">
    <div class="row pb-1 michroma">
        @include('partials.categories')
    </div>

    <hr>

    <div class="row">
        <!-- News -->
        <div class="col-9 pe-5">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-muted michroma fw-bold">@lang('RECENT NEWS')</h5>
                @auth
                    @if (Auth::user()->is_admin)
                        <a class="btn btn-warning rounded-circle" href="{{ route('post.create') }}"><i class="fa fa-plus"></i></a>
                    @endif
                @endauth
            </div>
            
            @forelse ($posts as $post)
                <div class="row bg-white my-4 p-3 shadow-sm">
                    <div class="col-5 my-auto p-0">
                        <a @if (Auth::user() and Auth::user()->is_admin) href="{{ route('post.show', $post) }}" @else href="https://warframe.com/news/{{ $post->url }}" target="_blank" @endif>
                            <img src="storage/post/{{ $post->image_path }}" class="img-responsive w-100">
                        </a>
                    </div>
                    <div class="col-7">
                        <strong class="michroma fs-5">{{ __($post->title) }}</strong>
                        <p class="text-muted my-1" style="font-size: 80%;">@lang('Posted On') {{ $post->created_at->format('Y-m-d H:i:s') }}</p>
                        <hr class="my-2">
                        <p class="text-muted m-0">{{ __($post->description) }}</p>
                        <a href="https://warframe.com/news/{{ $post->url }}" class="text-dark" target="_blank">@lang('Read More')</a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <!-- Social -->
        <div class="col-3" style="margin-top: 23px;"> 
            @include('partials.social')
        </div>
    </div>
    
    
</div>
@endsection