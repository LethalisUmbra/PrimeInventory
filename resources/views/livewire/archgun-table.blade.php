<form wire:submit.prevent="update_user_archgun">
    @csrf
    <input id="archgun_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto mt-3">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Archgun')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Barrel')</th> 
            <th scope="col" class="text-center">@lang('Receiver')</th>
            <th scope="col" class="text-center">@lang('Stock')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($archguns as $archgun)
                <input type="hidden" wire:model="id_archgun.{{ $loop->index }}">
                <tr>
                    <th id="{{ str_replace(' ', '%20', $archgun->name) }}%20Prime"
                        scope="row" class="prime-item col-4
                        @if($archgun->blueprint>=$archgun->r_blueprint & $archgun->barrel>=$archgun->r_barrel & $archgun->receiver>=$archgun->r_receiver & $archgun->stock>=$archgun->r_stock)
                            text-success
                        @else
                            text-white
                        @endif"
                    >{{ $archgun->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archgun_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archgun->blueprint < $archgun->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archgun->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archgun_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archgun->barrel < $archgun->r_barrel)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archgun->r_barrel }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archgun_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archgun->receiver < $archgun->r_receiver)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archgun->r_receiver }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('archgun_btn').click();" type="number" wire:model.defer="stock.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($archgun->stock < $archgun->r_stock)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $archgun->r_stock }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('archgun_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($archgun->owned)?'success':'danger' }}" @if($archgun->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

