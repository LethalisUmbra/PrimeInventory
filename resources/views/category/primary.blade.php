@extends('layout')

@section('title', __('Primaries'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0 py-4">
    <div class="col-12 mb-3 col-md-2 px-md-0">
        <div class="bg-white py-3 px-4 rounded shadow border">
            <h5>@lang('Categories')</h5>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="rifle_cb" name="rifle_cb" value="rifle_cb" checked onchange="switcher('rifle')">
                <label for="rifle_cb">@lang('Rifle')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="shotgun_cb" name="shotgun_cb" value="shotgun_cb" checked onchange="switcher('shotgun')">
                <label for="shotgun_cb">@lang('Shotgun')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="bow_cb" name="bow" value="bow" checked onchange="switcher('bow')">
                <label for="bow_cb">@lang('Bow')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="crossbow_cb" name="crossbow" value="crossbow_cb" checked onchange="switcher('crossbow')">
                <label for="crossbow_cb">@lang('Crossbow')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="speargun_cb" name="speargun" value="speargun_cb" checked onchange="switcher('speargun')">
                <label for="speargun_cb">@lang('Speargun')</label>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">
        @livewire('primary-tables')
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