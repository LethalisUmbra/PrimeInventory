<form wire:submit.prevent="update_user_hammer">
    @csrf
    <input id="hammer_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Hammer')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Head')</th> 
            <th scope="col" class="text-center">@lang('Handle')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($hammers as $hammer)
                <input type="hidden" wire:model="id_hammer.{{ $loop->index }}">
                <tr>
                    <th id="{{$hammer->name}}%20Prime" scope="row" class="prime-item col-6 @if($hammer->blueprint>=$hammer->r_blueprint & $hammer->head>=$hammer->r_head & $hammer->handle>=$hammer->r_handle) text-success @else text-white @endif">{{ $hammer->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->blueprint < $hammer->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $hammer->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="head.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->head < $hammer->r_head)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $hammer->r_head }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="handle.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->handle < $hammer->r_handle)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $hammer->r_handle }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('hammer_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($hammer->owned)?'success':'danger' }}" @if($hammer->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

