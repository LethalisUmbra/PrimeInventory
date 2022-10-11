<div class="row m-0" id="sentinel">
    @if(count($sentinels)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_sentinel">
            @csrf
            <input id="sentinel_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Sentinel')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Cerebrum')</th> 
                    <th scope="col" class="text-center">@lang('Carapace')</th>
                    <th scope="col" class="text-center">@lang('Systems')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($sentinels as $sentinel)
                        <input type="hidden" wire:model="sentinel.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$sentinel->name}}%20Prime" scope="row" class="prime-item col-4 @if($sentinel->blueprint>=$sentinel->r_blueprint & $sentinel->cerebrum>=$sentinel->r_cerebrum & $sentinel->carapace>=$sentinel->r_carapace & $sentinel->systems>=$sentinel->r_systems) text-success @else text-white @endif">{{ $sentinel->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sentinel_btn').click();" type="number" wire:model.defer="sentinel.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sentinel->blueprint < $sentinel->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sentinel->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sentinel_btn').click();" type="number" wire:model.defer="sentinel.{{$loop->index}}.cerebrum" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sentinel->cerebrum < $sentinel->r_cerebrum)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sentinel->r_cerebrum }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sentinel_btn').click();" type="number" wire:model.defer="sentinel.{{$loop->index}}.carapace" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sentinel->carapace < $sentinel->r_carapace)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sentinel->r_carapace }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('sentinel_btn').click();" type="number" wire:model.defer="sentinel.{{$loop->index}}.systems" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sentinel->systems < $sentinel->r_systems)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $sentinel->r_systems }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('sentinel_btn').click();" type="checkbox" wire:model.defer="sentinel.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sentinel->owned)?'success':'danger' }}" @if($sentinel->owned) checked @endif>
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
