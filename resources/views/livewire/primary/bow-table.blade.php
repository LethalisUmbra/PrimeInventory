<div class="row m-0" id="bow">
    @if(count($bows)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_bow">
            @csrf
            <input id="bow_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Bow')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Upper Limb')</th> 
                    <th scope="col" class="text-center">@lang('Lower Limb')</th> 
                    <th scope="col" class="text-center">@lang('Grip')</th>
                    <th scope="col" class="text-center">@lang('String')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($bows as $bow)
                        <input type="hidden" wire:model="bow.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$bow->name}}%20Prime" scope="row" class="prime-item col-2 @if($bow->blueprint>=$bow->r_blueprint & $bow->upper_limb>=$bow->r_upper_limb & $bow->lower_limb>=$bow->r_lower_limb & $bow->grip>=$bow->r_grip & $bow->string>=$bow->r_string) text-success @else text-white @endif">{{ $bow->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->blueprint < $bow->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $bow->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.upper_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->upper_limb < $bow->r_upper_limb)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $bow->r_upper_limb }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.lower_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->lower_limb < $bow->r_lower_limb)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $bow->r_lower_limb }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.grip" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->grip < $bow->r_grip)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $bow->r_grip }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.string" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->string < $bow->r_string)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $bow->r_string }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('bow_btn').click();" type="checkbox" wire:model.defer="bow.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($bow->owned)?'success':'danger' }}" @if($bow->owned) checked @endif>
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