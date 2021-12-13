<form wire:submit.prevent="update_user_warframe">
    @csrf
    <input id="warframe_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto mt-3">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Warframe')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Neuroptics')</th> 
            <th scope="col" class="text-center">@lang('Chassis')</th>
            <th scope="col" class="text-center">@lang('Systems')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($warframes as $warframe)
                <input type="hidden" wire:model="id_warframe.{{ $loop->index }}">
                <tr>
                    <th scope="row" class="col-4 @if($warframe->blueprint>=$warframe->r_blueprint & $warframe->neuroptics>=$warframe->r_neuroptics & $warframe->chassis>=$warframe->r_chassis & $warframe->systems>=$warframe->r_systems) text-success @else text-white @endif">{{ $warframe->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('warframe_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($warframe->blueprint < $warframe->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $warframe->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('warframe_btn').click();" type="number" wire:model.defer="neuroptics.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($warframe->neuroptics < $warframe->r_neuroptics)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $warframe->r_neuroptics }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('warframe_btn').click();" type="number" wire:model.defer="chassis.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($warframe->chassis < $warframe->r_chassis)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $warframe->r_chassis }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('warframe_btn').click();" type="number" wire:model.defer="systems.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($warframe->systems < $warframe->r_systems)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $warframe->r_systems }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('warframe_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($warframe->owned)?'success':'danger' }}" @if($warframe->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

