<div class="row m-0" id="swordshield">
    @if(count($swordshields)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_swordshield">
            @csrf
            <input id="sword_shield_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto mt-3">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Sword & Shield')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Blade')</th> 
                    <th scope="col" class="text-center">@lang('Guard')</th>
                    <th scope="col" class="text-center">@lang('Hilt')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($swordshields as $sword_shield)
                        <input type="hidden" wire:model="id_sword_shield.{{ $loop->index }}">
                        <tr>
                            <th id="{{$sword_shield->name}}%20Prime" scope="row" class="prime-item col-4 @if($sword_shield->blueprint>=$sword_shield->r_blueprint & $sword_shield->blade>=$sword_shield->r_blade & $sword_shield->guard>=$sword_shield->r_guard & $sword_shield->hilt>=$sword_shield->r_hilt) text-success @else text-white @endif">{{ $sword_shield->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->blueprint < $sword_shield->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sword_shield->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->blade < $sword_shield->r_blade)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sword_shield->r_blade }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.guard" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->guard < $sword_shield->r_guard)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sword_shield->r_guard }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.hilt" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->hilt < $sword_shield->r_hilt)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sword_shield->r_hilt }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('sword_shield_btn').click();" type="checkbox" wire:model.defer="swordshield.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sword_shield->owned)?'success':'danger' }}" @if($sword_shield->owned) checked @endif>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </form>
        </div>
    @endif
</div>