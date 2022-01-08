<form wire:submit.prevent="update_user_dual_pistol">
    @csrf
    <input id="dual_pistol_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Dual Pistols')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Barrel')</th> 
            <th scope="col" class="text-center">@lang('Receiver')</th>
            <th scope="col" class="text-center">@lang('Link')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($dual_pistols as $dual_pistol)
                <input type="hidden" wire:model="id_dual_pistol.{{ $loop->index }}">
                <tr>
                    <th id="{{$dual_pistol->name}}%20Prime" scope="row" class="prime-item col-4 @if($dual_pistol->blueprint>=$dual_pistol->r_blueprint & $dual_pistol->barrel>=$dual_pistol->r_barrel & $dual_pistol->receiver>=$dual_pistol->r_receiver & $dual_pistol->link>=$dual_pistol->r_link) text-success @else text-white @endif">{{ $dual_pistol->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('dual_pistol_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($dual_pistol->blueprint < $dual_pistol->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $dual_pistol->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('dual_pistol_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($dual_pistol->barrel < $dual_pistol->r_barrel)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $dual_pistol->r_barrel }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('dual_pistol_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($dual_pistol->receiver < $dual_pistol->r_receiver)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $dual_pistol->r_receiver }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('dual_pistol_btn').click();" type="number" wire:model.defer="link.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($dual_pistol->link < $dual_pistol->r_link)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $dual_pistol->r_link }}</p>
                    </td>
                    <td class="text-center col-2">
                        <input onchange="document.getElementById('dual_pistol_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($dual_pistol->owned)?'success':'danger' }}" @if($dual_pistol->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

