<form wire:submit.prevent="update_user_archwing">
    @csrf
    <input id="archwing_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto mt-3">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Archwing')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Harness')</th> 
            <th scope="col" class="text-center">@lang('Wings')</th>
            <th scope="col" class="text-center">@lang('Systems')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($archwings as $archwing)
                <input type="hidden" wire:model="id_archwing.{{ $loop->index }}">
                <tr>
                    <th scope="row" class="col-4 @if($archwing->blueprint>=$archwing->r_blueprint & $archwing->harness>=$archwing->r_harness & $archwing->wings>=$archwing->r_wings & $archwing->systems>=$archwing->r_systems) text-success @else text-white @endif">{{ $archwing->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archwing_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archwing->blueprint < $archwing->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archwing->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archwing_btn').click();" type="number" wire:model.defer="harness.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archwing->harness < $archwing->r_harness)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archwing->r_harness }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archwing_btn').click();" type="number" wire:model.defer="wings.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archwing->wings < $archwing->r_wings)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archwing->r_wings }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archwing_btn').click();" type="number" wire:model.defer="systems.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archwing->systems < $archwing->r_systems)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archwing->r_systems }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('archwing_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($archwing->owned)?'success':'danger' }}" @if($archwing->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

