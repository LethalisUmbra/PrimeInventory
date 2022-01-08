<form wire:submit.prevent="update_user_shotgun_sidearm">
    @csrf
    <input id="shotgun_sidearm_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Shotgun Sidearm')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Barrel')</th> 
            <th scope="col" class="text-center">@lang('Receiver')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($shotgun_sidearms as $shotgun_sidearm)
                <input type="hidden" wire:model="id_shotgun_sidearm.{{ $loop->index }}">
                <tr>
                    <th id="{{$shotgun_sidearm->name}}%20Prime" scope="row" class="prime-item col-6 @if($shotgun_sidearm->blueprint>=$shotgun_sidearm->r_blueprint & $shotgun_sidearm->barrel>=$shotgun_sidearm->r_barrel & $shotgun_sidearm->receiver>=$shotgun_sidearm->r_receiver) text-success @else text-white @endif">{{ $shotgun_sidearm->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_sidearm_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun_sidearm->blueprint < $shotgun_sidearm->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun_sidearm->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_sidearm_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun_sidearm->barrel < $shotgun_sidearm->r_barrel)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun_sidearm->r_barrel }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_sidearm_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun_sidearm->receiver < $shotgun_sidearm->r_receiver)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun_sidearm->r_receiver }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('shotgun_sidearm_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($shotgun_sidearm->owned)?'success':'danger' }}" @if($shotgun_sidearm->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

