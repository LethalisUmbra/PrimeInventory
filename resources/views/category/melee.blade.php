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

        <input id="keyword" wire:model="keyword" type="text" placeholder="@lang('Seach Weapon')" style="margin:12px;" onkeyup="filter()"/>

        <div class="row m-0 mb-3" id="melee">
            <div class="mx-auto rounded table-responsive">
                @livewire('melee-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="fist">
            <div class="mx-auto rounded table-responsive">
                @livewire('fist-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="staff">
            <div class="mx-auto rounded table-responsive">
                @livewire('staff-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="hammer">
            <div class="mx-auto rounded table-responsive">
                @livewire('hammer-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="glaive">
            <div class="mx-auto rounded table-responsive">
                @livewire('glaive-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="sparring">
            <div class="mx-auto rounded table-responsive">
                @livewire('sparring-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="nikana">
            <div class="mx-auto rounded table-responsive">
                @livewire('nikana-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="nunchaku">
            <div class="mx-auto rounded table-responsive">
                @livewire('nunchaku-table')
            </div>
        </div>

        <div class="row m-0 mb-3" id="sword_shield">
            <div class="mx-auto rounded table-responsive">
                @livewire('sword-shield-table')
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

    function filter(){
        
        var keyword = document.getElementById('keyword');
        var melee = document.getElementById('melee');
        
        melee.value = keyword.value;

        alert(melee.value);
    }
</script>
@endsection