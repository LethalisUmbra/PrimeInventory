@extends('layout')

@section('title', __('Companions'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0 py-4">
    <div class="col-12 my-3 col-md-2 px-md-0">
        <div class="bg-white py-3 px-4 rounded shadow border">
            <h5>@lang('Categories')</h5>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="sentinel_cb" name="sentinel_cb" value="sentinel_cb" checked onchange="switcher('sentinel')">
                <label for="sentinel_cb">@lang('Sentinel')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="collar_cb" name="collar_cb" value="collar_cb" checked onchange="switcher('collar')">
                <label for="collar_cb">@lang('Collar')</label>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">

        <div class="row m-0 mb-3" id="sentinel">
            <div class="mx-auto rounded table-responsive">
                @livewire('sentinel-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="collar">
            <div class="mx-auto rounded table-responsive">
                @livewire('collar-table')
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

<script>
    function switcher(category){
        var checkBox = document.getElementById(category + '_cb');
        var container = document.getElementById(category);

        if (checkBox.checked)
        {
            container.style.display = 'flex';
        }
        else
        {
            container.style.display = 'none';
        }
    }
</script>
@endsection