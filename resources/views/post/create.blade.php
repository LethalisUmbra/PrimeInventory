@extends('layout')

@section('title', __('Create post'))

@section('content')
<!-- if validation in the controller fails, show the errors -->
@if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded p-3" enctype="multipart/form-data" method="POST" action="{{ route('post.store') }}">
                <h1>@lang('Create new post')</h1>
                <hr>
                @include('post._form', ['btnText' => 'Save', 'required' => 'required'])
            </form>
        </div>
    </div>
</div>
@endsection