<div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input id="filter" wire:model="filter" type="text" placeholder="@lang('Seach Weapon')" class="form-control"/>
    </div>

    {{-- Pistol --}}
    <div class="row m-0 mb-3" id="pistol">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.pistol-table')
        </div>
    </div>

    {{-- Dual Pistol --}}
    <div class="row m-0 mb-3" id="dual_pistol">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.dual-pistol-table')
        </div>
    </div>

    {{-- AK Weapons --}}
    <div class="row m-0 mb-3" id="ak_weapon">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.ak-weapon-table')
        </div>
    </div>

    {{-- Shotgun Sidearm --}}
    <div class="row m-0 mb-3" id="shotgun_sidearm">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.shotgun-sidearm-table')
        </div>
    </div>

    {{-- Thrown --}}
    <div class="row m-0 mb-3" id="thrown">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.thrown-table')
        </div>
    </div>

    {{-- Crossbow --}}
    <div class="row m-0 mb-3" id="sec_crossbow">
        <div class="mx-auto rounded table-responsive">
            @livewire('secondary.sec-crossbow-table')
        </div>
    </div>
</div>