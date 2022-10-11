<div class="row m-0" id="ak_weapon">
    @if(count($ak_weapons)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_ak_weapon">
            @csrf
            <input id="ak_weapon_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Dual Weapons')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Main Weapon')</th> 
                    <th scope="col" class="text-center">@lang('Link')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($ak_weapons as $ak_weapon)
                        <input type="hidden" wire:model="ak_weapon.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$ak_weapon->name}}%20Prime" scope="row" class="prime-item col-6 @if($ak_weapon->blueprint>=$ak_weapon->r_blueprint & $ak_weapon->single_weapon>=$ak_weapon->r_single_weapon & $ak_weapon->link>=$ak_weapon->r_link) text-success @else text-white @endif">{{ $ak_weapon->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('ak_weapon_btn').click();" type="number" wire:model.defer="ak_weapon.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($ak_weapon->blueprint < $ak_weapon->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $ak_weapon->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('ak_weapon_btn').click();" type="number" wire:model.defer="ak_weapon.{{$loop->index}}.single_weapon" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($ak_weapon->single_weapon < $ak_weapon->r_single_weapon)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $ak_weapon->r_single_weapon }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('ak_weapon_btn').click();" type="number" wire:model.defer="ak_weapon.{{$loop->index}}.link" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($ak_weapon->link < $ak_weapon->r_link)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $ak_weapon->r_link }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('ak_weapon_btn').click();" type="checkbox" wire:model.defer="ak_weapon.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($ak_weapon->owned)?'success':'danger' }}" @if($ak_weapon->owned) checked @endif>
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