<div class="col-12 col-md-10 col-lg-8 col-xl-6 p-0" style="font-size: .75rem;">
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input wire:model="filter" type="text" placeholder="@lang('Search') {{__($category)}}" class="form-control"/>
    </div>

    @livewire('category', ['category' => $category])
</div>