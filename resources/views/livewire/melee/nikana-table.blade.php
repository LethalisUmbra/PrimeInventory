<div class="row m-0" id="nikana">
    @if(count($nikanas)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_nikana">
            @csrf
            <input id="nikana_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Nikana')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Blade')</th> 
                    <th scope="col" class="text-center">@lang('Hilt')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($nikanas as $nikana)
                        <input type="hidden" wire:model="id_nikana.{{ $loop->index }}">
                        <tr>
                            <th id="{{$nikana->name}}%20Prime" scope="row" class="prime-item col-6 @if($nikana->blueprint>=$nikana->r_blueprint & $nikana->blade>=$nikana->r_blade & $nikana->hilt>=$nikana->r_hilt) text-success @else text-white @endif">{{ $nikana->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->blueprint < $nikana->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $nikana->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->blade < $nikana->r_blade)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $nikana->r_blade }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.hilt" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->hilt < $nikana->r_hilt)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $nikana->r_hilt }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('nikana_btn').click();" type="checkbox" wire:model.defer="nikana.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($nikana->owned)?'success':'danger' }}" @if($nikana->owned) checked @endif>
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