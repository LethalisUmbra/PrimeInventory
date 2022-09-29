<div>
@if(count($sec_crossbows)>0)
<form wire:submit.prevent="update_user_sec_crossbow">
    @csrf
    <input id="sec_crossbow_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Crossbow')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Upper Limb')</th> 
            <th scope="col" class="text-center">@lang('Lower Limb')</th> 
            <th scope="col" class="text-center">@lang('String')</th>
            <th scope="col" class="text-center">@lang('Receiver')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($sec_crossbows as $sec_crossbow)
                <input type="hidden" wire:model="sec_crossbow.{{ $loop->index }}.id">
                <tr>
                    <th id="{{$sec_crossbow->name}}%20Prime" scope="row" class="prime-item col-2 @if($sec_crossbow->blueprint>=$sec_crossbow->r_blueprint & $sec_crossbow->upper_limb>=$sec_crossbow->r_upper_limb & $sec_crossbow->lower_limb>=$sec_crossbow->r_lower_limb & $sec_crossbow->receiver>=$sec_crossbow->r_receiver & $sec_crossbow->string>=$sec_crossbow->r_string) text-success @else text-white @endif">{{ $sec_crossbow->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sec_crossbow_btn').click();" type="number" wire:model.defer="sec_crossbow.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sec_crossbow->blueprint < $sec_crossbow->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sec_crossbow->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sec_crossbow_btn').click();" type="number" wire:model.defer="sec_crossbow.{{$loop->index}}.upper_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sec_crossbow->upper_limb < $sec_crossbow->r_upper_limb)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sec_crossbow->r_upper_limb }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sec_crossbow_btn').click();" type="number" wire:model.defer="sec_crossbow.{{$loop->index}}.lower_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sec_crossbow->lower_limb < $sec_crossbow->r_lower_limb)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sec_crossbow->r_lower_limb }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sec_crossbow_btn').click();" type="number" wire:model.defer="sec_crossbow.{{$loop->index}}.string" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sec_crossbow->string < $sec_crossbow->r_string)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sec_crossbow->r_string }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('sec_crossbow_btn').click();" type="number" wire:model.defer="sec_crossbow.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sec_crossbow->receiver < $sec_crossbow->r_receiver)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $sec_crossbow->r_receiver }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('sec_crossbow_btn').click();" type="checkbox" wire:model.defer="sec_crossbow.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sec_crossbow->owned)?'success':'danger' }}" @if($sec_crossbow->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>
@endif
</div>