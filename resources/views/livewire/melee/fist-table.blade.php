<div>
    @if(count($fists)>0)
    <form wire:submit.prevent="update_user_fist">
        @csrf
        <input id="fist_btn" type="submit" class="d-none" value="@lang('Update')">
        <table class="table table-dark table-hover mx-auto">
            <thead>
            <tr class="text-warning">
                <th scope="col">@lang('Fist')</th>
                <th scope="col" class="text-center">@lang('Blueprint')</th>
                <th scope="col" class="text-center">@lang('Blade')</th> 
                <th scope="col" class="text-center">@lang('Gauntlet')</th>
                <th scope="col" class="text-center">@lang('Owned')</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($fists as $fist)
                    <input type="hidden" wire:model="id_fist.{{ $loop->index }}">
                    <tr>
                        <th id="{{$fist->name}}%20Prime" scope="row" class="prime-item col-6 @if($fist->blueprint>=$fist->r_blueprint & $fist->blade>=$fist->r_blade & $fist->gauntlet>=$fist->r_gauntlet) text-success @else text-white @endif">{{ $fist->name }} Prime</th>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->blueprint < $fist->r_blueprint)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $fist->r_blueprint }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->blade < $fist->r_blade)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $fist->r_blade }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.gauntlet" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->gauntlet < $fist->r_gauntlet)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $fist->r_gauntlet }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input onchange="document.getElementById('fist_btn').click();" type="checkbox" wire:model.defer="fist.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($fist->owned)?'success':'danger' }}" @if($fist->owned) checked @endif>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </form>
    @endif
</div>