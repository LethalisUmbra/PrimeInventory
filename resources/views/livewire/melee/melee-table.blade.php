<div class="row m-0" id="melee">
    @if(count($melees)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_melee">
            @csrf
            <input id="melee_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Melee')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Blade')</th> 
                    <th scope="col" class="text-center">@lang('Handle')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($melees as $melee)
                    <input type="hidden" wire:model="_melee.id.{{ $loop->index }}">
                        <tr>
                            <th id="{{ $melee->name }}%20Prime" scope="row" class="prime-item col-6 @if($melee->blueprint>=$melee->r_blueprint & $melee->blade>=$melee->r_blade & $melee->handle>=$melee->r_handle) text-success @else text-white @endif">{{ __($melee->name) }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blueprint < $melee->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $melee->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blade < $melee->r_blade)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $melee->r_blade }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->handle < $melee->r_handle)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $melee->r_handle }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('melee_btn').click();" type="checkbox" wire:model.defer="melee.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($melee->owned)?'success':'danger' }}" @if($melee->owned) checked @endif>
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