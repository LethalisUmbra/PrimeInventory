@extends('layout')

@section('title', __('Edit') .' - '. ucfirst(strtolower(__($post->title))))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded p-3" method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                @method('PATCH')
                <h1>@lang('Edit post')</h1>
                <hr>
                @include('post._form', ['btnText' => 'Update', 'required' => ''])
            </form>
        </div>
    </div>
</div>
@endsection