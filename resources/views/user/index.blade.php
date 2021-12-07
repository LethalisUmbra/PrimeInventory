@extends('layout')

@auth
    @section('title', 'Users' )
@endauth

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>@lang('Users')</h1>
                    <a class="btn btn-warning rounded-circle" href="{{ route('user.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-dark table-striped table-responsive align-middle table-hover">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col" class="w-25">@lang('Username')</th>
                          <th scope="col" class="w-25">@lang('E-Mail')</th>
                          <th scope="col" class="w-25">@lang('Verified')</th>
                          <th scope="col" class="text-center">@lang('Is Admin')</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if (is_null($user->email_verified_at)) <i class="fas fa-times text-danger"></i> @else {{ $user->email_verified_at }} @endif</td>
                                <td class="text-center"><i class="fas @if ($user->is_admin)fa-check  text-success @else fa-times text-danger @endif "></i></td>
                                <td >
                                    <a class="btn btn-outline-warning fw-bold" href="{{ route('user.show', $user) }}">@lang('Show')</a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                      </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection