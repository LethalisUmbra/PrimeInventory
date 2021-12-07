@extends('layout')

@section('title', __('Primaries'))

@section('content')
<div class="container">
    <ul>
        <li><a href="{{ route('rifle.index') }}">@lang("Rifle")</a></li>
    </ul>
</div>
@endsection