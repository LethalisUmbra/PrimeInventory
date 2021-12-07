@extends('layout')

@section('title', __('Rifles'))

@section('content')
    <div class="row m-0">
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto rounded">
            @livewire('rifle-table')
        </div>
    </div>

@livewireScripts

@endsection

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
</style>