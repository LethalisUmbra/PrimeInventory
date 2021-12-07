@extends('layout')

@auth
    @section('title', $user->name )
@endauth

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6 bg-white rounded px-5 py-4 mx-auto">
            <div class="d-flex justify-content-between">
                <h1 class="fw-bold">@lang('Edit')</h1>
                <a type="button" class="btn btn-warning fw-bold h-auto mb-auto" href="{{ route('user.show', $user) }}">@lang('Back')</a>
            </div>
            <hr>
            <form method="POST" action="{{ route('user.update', $user) }}">
                @method('PATCH')
                @csrf 
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

                @if (Auth::user()->id == $user->id)
                <div class="mb-3">
                    <label for="password">@lang('Password')</label>
                    <input type="password" id="password" name="password" class="form-control bg-light shadow-sm border-0" required
                        value="{{ old('password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @endif
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success fw-bold btn-lg">@lang('Update')</button>
                    <a class="btn btn-link text-decoration-none" href="{{ route('password.update') }}">@lang("Forgot Password")</a>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection