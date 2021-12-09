@extends('layout')

@section('title', __('Primaries'))

@section('content')
    <div class="row m-0">
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto rounded">
            @livewire('rifle-table')
        </div>
    </div>

    <div class="row m-0">
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto rounded">
            @livewire('shotgun-table')
        </div>
    </div>

    <div class="row m-0">
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto rounded">
            @livewire('bow-table')
        </div>
    </div>

    <div class="row m-0">
        <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto rounded">
            @livewire('crossbow-table')
        </div>
    </div>

    @livewireScripts

@endsection

@section('style')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
</style>
@endsection