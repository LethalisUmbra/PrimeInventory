<div class="row m-0" id="collar">
    @if(count($collars)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_collar">
            @csrf
            <input id="collar_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto mt-3">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Collar')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Band')</th>
                    <th scope="col" class="text-center">@lang('Buckle')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($collars as $collar)
                        <input type="hidden" wire:model="collar.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$collar->name}}%20Prime" scope="row" class="prime-item col-6 @if($collar->blueprint>=$collar->r_blueprint & $collar->band>=$collar->r_band & $collar->buckle>=$collar->r_buckle) text-success @else text-white @endif">{{ $collar->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('collar_btn').click();" type="number" wire:model.defer="collar.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($collar->blueprint < $collar->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $collar->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('collar_btn').click();" type="number" wire:model.defer="collar.{{$loop->index}}.band" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($collar->band < $collar->r_band)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $collar->r_band }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('collar_btn').click();" type="number" wire:model.defer="collar.{{$loop->index}}.buckle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($collar->buckle < $collar->r_buckle)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $collar->r_buckle }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('collar_btn').click();" type="checkbox" wire:model.defer="collar.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($collar->owned)?'success':'danger' }}" @if($collar->owned) checked @endif>
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
