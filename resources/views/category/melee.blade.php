@extends('layout')

@section('title', __('Melees'))

@section('carousel')
@include('partials.carousel')
@endsection

@section('content')
<div class="row d-flex justify-content-center mx-0 py-4">
    <div class="col-12 mb-3 col-md-2 px-md-0">
        <div class="bg-white py-3 px-4 rounded shadow border">
            <h5>@lang('Categories')</h5>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="melee_cb" name="melee_cb" value="melee_cb" checked onchange="switcher('melee')">
                <label for="melee_cb">@lang('Melee')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="fist_cb" name="fist_cb" value="fist_cb" checked onchange="switcher('fist')">
                <label for="fist_cb">@lang('Fist')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="staff_cb" name="staff" value="staff" checked onchange="switcher('staff')">
                <label for="staff_cb">@lang('Staff')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="hammer_cb" name="hammer" value="hammer_cb" checked onchange="switcher('hammer')">
                <label for="hammer_cb">@lang('Hammer')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="glaive_cb" name="glaive_cb" value="glaive_cb" checked onchange="switcher('glaive')">
                <label for="glaive_cb">@lang('Glaive')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="sparring_cb" name="sparring_cb" value="sparring_cb" checked onchange="switcher('sparring')">
                <label for="sparring_cb">@lang('Sparring')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="nikana_cb" name="nikana" value="nikana" checked onchange="switcher('nikana')">
                <label for="nikana_cb">@lang('Nikana')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="nunchaku_cb" name="nunchaku" value="nunchaku_cb" checked onchange="switcher('nunchaku')">
                <label for="nunchaku_cb">@lang('Nunchaku')</label>
            </div>

            <div class="my-2">
                <input class="form-check-input" type="checkbox" id="sword_shield_cb" name="sword_shield" value="sword_shield_cb" checked onchange="switcher('sword_shield')">
                <label for="sword_shield_cb">@lang('Sword & Shield')</label>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">

        @livewire('melee-tables')
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