@extends('layout')

@section('title', __('Secondaries'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0">
    <div class="col-12 mb-3 col-md-2 px-md-0">
        <div class="bg-white py-3 px-4 rounded shadow border">
            <h5>@lang('Categories')</h5>
            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="dual_pistol_cb" name="dual_pistol_cb" value="dual_pistol_cb" checked onchange="switcher('dual_pistol')">
                <label for="dual_pistol_cb">@lang('Dual Pistols')</label>
            </div>
            
            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="ak_weapon_cb" name="ak_weapon_cb" value="ak_weapon_cb" checked onchange="switcher('ak_weapon')">
                <label for="ak_weapon_cb">@lang('Dual Weapons')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="sec_crossbow_cb" name="sec_crossbow" value="sec_crossbow" checked onchange="switcher('sec_crossbow')">
                <label for="sec_crossbow_cb">@lang('Crossbow')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="shotgun_sidearm_cb" name="shotgun_sidearm" value="shotgun_sidearm_cb" checked onchange="switcher('shotgun_sidearm')">
                <label for="shotgun_sidearm_cb">@lang('Shotgun Sidearm')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="thrown_cb" name="thrown" value="thrown_cb" checked onchange="switcher('thrown')">
                <label for="thrown_cb">@lang('Thrown')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="pistol_cb" name="pistol" value="pistol" checked onchange="switcher('pistol')">
                <label for="pistol_cb">@lang('Pistol')</label>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">

        <div class="row m-0 mb-3" id="dual_pistol">
            <div class="mx-auto rounded table-responsive">
                @livewire('dual-pistol-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="ak_weapon">
            <div class="mx-auto rounded table-responsive">
                @livewire('ak-weapon-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="shotgun_sidearm">
            <div class="mx-auto rounded table-responsive">
                @livewire('shotgun-sidearm-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="thrown">
            <div class="mx-auto rounded table-responsive">
                @livewire('thrown-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="pistol">
            <div class="mx-auto rounded table-responsive">
                @livewire('pistol-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="sec_crossbow">
            <div class="mx-auto rounded table-responsive">
                @livewire('sec-crossbow-table')
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