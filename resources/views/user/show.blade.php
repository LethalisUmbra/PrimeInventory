@extends('layout')

@auth
    @section('title', $user->name )
@endauth

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6 bg-white rounded px-5 pt-5 pb-0 mx-auto">
            <div class="d-flex justify-content-between align-middle">
                <h1 class="fw-bold">{{ $user->name }}</h1>
                <div class="btn-group">
                    @if ($user->is_admin && (Auth::user()->id != $user->id)) @else <a class="btn btn-warning fw-bold my-auto w-50" type="button" href="{{ route('user.edit', $user) }}">@lang('Edit')</a> @endif 
                    @if (Auth::user()->is_admin && !$user->is_admin)
                        <a class="btn btn-danger text-white fw-bold my-auto w-50 rounded-end" type="button" href="#" onclick="document.getElementById('delete-user').submit()">
                            @lang('Delete')
                        </a>
                        <form class="d-none" id="delete-user" method="POST" action="{{ route('user.destroy', $user) }}">
                            @csrf @method('DELETE')
                        </form>
                    @endif
                </div>
            </div>

            <p class="text-muted lead">{{ $user->email }}</p>

            @if(is_null($user->email_verified_at))
                <small class="text-danger align-middle">@lang('Not verified')</small><br>
                @if(Auth::user()->id == $user->id)
                    <a class="btn btn-success fw-bold mt-1" href="{{ route('verification.notice', $user->email) }}">
                        @lang('Verify')
                    </a>
                @endif
            @else
                <small class="text-success align-middle">@lang('Verified')</small>
            @endif
            <hr>
            <div class="d-flex justify-content-evenly text-black-50">
                <p>{{ __('Created at') .' '. $user->created_at->format('Y-m-d H:i') }}</p>
                <p>{{ __('Updated at') .' '. $user->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
    
</div>
@endsection