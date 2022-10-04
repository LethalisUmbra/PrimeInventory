<div>
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input id="filter_primary" wire:model="filter" type="text" placeholder="@lang('Seach Weapon')" class="form-control"/>
    </div>

    <div class="row m-0 mb-3" id="rifle">
        <div class="mx-auto rounded table-responsive">
            @livewire('primary.rifle-table')
        </div>
    </div>

    <div class="row m-0 mb-3" id="shotgun">
        <div class="mx-auto rounded table-responsive">
            @livewire('primary.shotgun-table')           
        </div>
    </div>

    <div class="row m-0 mb-3" id="bow">
        <div class="mx-auto rounded table-responsive">
            @livewire('primary.bow-table')
        </div>
    </div>

    <div class="row m-0 mb-3" id="crossbow">
        <div class="mx-auto rounded table-responsive">
            @livewire('primary.crossbow-table')        
        </div>
    </div>

    <div class="row m-0 mb-3" id="speargun">
        <div class="mx-auto rounded table-responsive">
            @livewire('primary.speargun-table')          
        </div>
    </div>
</div>