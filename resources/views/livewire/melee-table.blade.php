<form wire:submit.prevent="update_user_melee">
    @csrf
    <input id="melee_btn" type="submit" class="d-none" value="@lang('Update')">
    <input id="melee" wire:model="keyword" type="text" placeholder="@lang('Seach Weapon')" class="d-none"/>
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Melee')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Blade')</th> 
            <th scope="col" class="text-center">@lang('Handle')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($melees as $melee)
                <input type="hidden" wire:model="id_melee.{{ $loop->index }}">
                <tr>
                    <th id="{{ $melee->name }}%20Prime" scope="row" class="prime-item col-6 @if($melee->blueprint>=$melee->r_blueprint & $melee->blade>=$melee->r_blade & $melee->handle>=$melee->r_handle) text-success @else text-white @endif">{{ __($melee->name) }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blueprint < $melee->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $melee->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="blade.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blade < $melee->r_blade)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $melee->r_blade }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="handle.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->handle < $melee->r_handle)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $melee->r_handle }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('melee_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($melee->owned)?'success':'danger' }}" @if($melee->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

