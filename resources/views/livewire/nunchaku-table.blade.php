<form wire:submit.prevent="update_user_nunchaku">
    @csrf
    <input id="nunchaku_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Nunchaku')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Handle')</th> 
            <th scope="col" class="text-center">@lang('Chain')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($nunchakus as $nunchaku)
                <input type="hidden" wire:model="id_nunchaku.{{ $loop->index }}">
                <tr>
                    <th id="{{$nunchaku->name}}%20Prime" scope="row" class="prime-item col-6 @if($nunchaku->blueprint>=$nunchaku->r_blueprint & $nunchaku->handle>=$nunchaku->r_handle & $nunchaku->chain>=$nunchaku->r_chain) text-success @else text-white @endif">{{ $nunchaku->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->blueprint < $nunchaku->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $nunchaku->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="handle.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->handle < $nunchaku->r_handle)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $nunchaku->r_handle }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="chain.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->chain < $nunchaku->r_chain)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $nunchaku->r_chain }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('nunchaku_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($nunchaku->owned)?'success':'danger' }}" @if($nunchaku->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

