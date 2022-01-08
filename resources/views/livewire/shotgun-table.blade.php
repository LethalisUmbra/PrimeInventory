<form wire:submit.prevent="update_user_shotgun">
    @csrf
    <input id="shotgun_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Shotgun')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Barrel')</th> 
            <th scope="col" class="text-center">@lang('Receiver')</th>
            <th scope="col" class="text-center">@lang('Stock')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($shotguns as $shotgun)
                <input type="hidden" wire:model="id_shotgun.{{ $loop->index }}">
                <tr>
                    <th id="{{$shotgun->name}}%20Prime" scope="row" class="prime-item col-4 @if($shotgun->blueprint>=$shotgun->r_blueprint & $shotgun->barrel>=$shotgun->r_barrel & $shotgun->receiver>=$shotgun->r_receiver & $shotgun->stock>=$shotgun->r_stock) text-success @else text-white @endif">{{ $shotgun->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->blueprint < $shotgun->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->barrel < $shotgun->r_barrel)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun->r_barrel }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->receiver < $shotgun->r_receiver)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun->r_receiver }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="stock.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->stock < $shotgun->r_stock)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $shotgun->r_stock }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('shotgun_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($shotgun->owned)?'success':'danger' }}" @if($shotgun->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

