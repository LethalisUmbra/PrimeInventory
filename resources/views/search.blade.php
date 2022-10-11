@extends('layout')

@section('title', __('Search'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0 py-4">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: .75rem;">
        @livewire('category', ['filter' => $filter, 'category' => 'primary'])
        @livewire('category', ['filter' => $filter, 'category' => 'secondary'])
        @livewire('category', ['filter' => $filter, 'category' => 'melee'])
        @livewire('category', ['filter' => $filter, 'category' => 'warframe'])
        @livewire('category', ['filter' => $filter, 'category' => 'companion'])
        @livewire('category', ['filter' => $filter, 'category' => 'archwing'])
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