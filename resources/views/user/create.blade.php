@extends('layout')

@section('title', __('Create User'))

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded p-3" method="POST" action="{{ route('user.store') }}">
                @csrf
                <h1>@auth @lang('Create new user') @else @lang('Register') @endauth</h1>
                <hr>
                <div class="mb-3">
                    <label for="name">@lang('Username')</label>
                    <input id="name" name="name" class="form-control bg-light shadow-sm border-0" required
                        value="{{ old('name', $user->name)}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">@lang('E-Mail Address')</label>
                    <input type="email" id="email" name="email" class="form-control bg-light shadow-sm border-0" required
                        value="{{ old('email', $user->email)}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">@lang('Password')</label>
                    <input id="password" type="password" name="password" class="form-control bg-light shadow-sm border-0" required
                        value="{{ old('password', $user->password)}}" autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password">@lang('Confirm Password')</label>
                    <input id="password" type="password" name="password_confirmation" class="form-control bg-light shadow-sm border-0" required
                        value="{{ old('password', $user->password)}}" autocomplete="current-password">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning w-50 mx-auto fw-bold btn-lg">@lang('Register')</button>
                    <a class="btn btn-link text-decoration-none" href="{{ route('login') }}">@lang("Already registered?")</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection