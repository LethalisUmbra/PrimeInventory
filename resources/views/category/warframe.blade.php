@extends('layout')

@section('title', __('Warframes'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0 py-4">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">
        <div class="row m-0 mb-3" id="warframe">
            <div class="mx-auto rounded table-responsive">
                @livewire('warframe-table')
            </div>
        </div>
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