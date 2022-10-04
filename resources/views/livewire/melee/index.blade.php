<div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: 12px;">
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input id="filter" wire:model="filter" type="text" placeholder="@lang('Seach Weapon')" class="form-control"/>
    </div>

    {{-- Melee --}}
    <div class="row m-0 mb-3" id="pistol">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.melee-table')
        </div>
    </div>

    {{-- Fist --}}
    <div class="row m-0 mb-3" id="fist">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.fist-table')
        </div>
    </div>

    {{-- Staffs --}}
    <div class="row m-0 mb-3" id="staff">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.staff-table')
        </div>
    </div>

    {{-- Hammer --}}
    <div class="row m-0 mb-3" id="hammer">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.hammer-table')
        </div>
    </div>

    {{-- Glaive --}}
    <div class="row m-0 mb-3" id="glaive">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.glaive-table')          
        </div>
    </div>

    {{-- Sparring --}}
    <div class="row m-0 mb-3" id="sparring">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.sparring-table')         
        </div>
    </div>

    {{-- Nikana --}}
    <div class="row m-0 mb-3" id="nikana">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.nikana-table')
        </div>
    </div>

    {{-- Nunchaku --}}
    <div class="row m-0 mb-3" id="nunchaku">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.nunchaku-table')
        </div>
    </div>

    {{-- Swordshield --}}
    <div class="row m-0 mb-3" id="sword_shield">
        <div class="mx-auto rounded table-responsive">
            @livewire('melee.swordshield-table')
        </div>
    </div>
</div>