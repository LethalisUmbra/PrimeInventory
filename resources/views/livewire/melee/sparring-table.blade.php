<div>
@if(count($sparrings)>0)
<form wire:submit.prevent="update_user_sparring">
    @csrf
    <input id="sparring_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Sparring')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Gauntlet')</th> 
            <th scope="col" class="text-center">@lang('Boot')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($sparrings as $sparring)
                <input type="hidden" wire:model="id_sparring.{{ $loop->index }}">
                <tr>
                    <th id="{{$sparring->name}}%20Prime" scope="row" class="prime-item col-6 @if($sparring->blueprint>=$sparring->r_blueprint & $sparring->gauntlet>=$sparring->r_gauntlet & $sparring->boot>=$sparring->r_boot) text-success @else text-white @endif">{{ $sparring->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->blueprint < $sparring->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sparring->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.gauntlet" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->gauntlet < $sparring->r_gauntlet)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sparring->r_gauntlet }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.boot" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->boot < $sparring->r_boot)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sparring->r_boot }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('sparring_btn').click();" type="checkbox" wire:model.defer="sparring.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sparring->owned)?'success':'danger' }}" @if($sparring->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>   
@endif
</div>