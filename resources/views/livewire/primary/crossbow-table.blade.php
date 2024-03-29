<div class="row m-0" id="crossbow">
    @if(count($crossbows)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_crossbow">
            @csrf
            <input id="crossbow_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Crossbow')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Grip')</th>
                    <th scope="col" class="text-center">@lang('String')</th>
                    <th scope="col" class="text-center">@lang('Barrel')</th> 
                    <th scope="col" class="text-center">@lang('Receiver')</th> 
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($crossbows as $crossbow)
                        <input type="hidden" wire:model="crossbow.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$crossbow->name}}%20Prime" scope="row" class="prime-item col-2 @if($crossbow->blueprint>=$crossbow->r_blueprint & $crossbow->barrel>=$crossbow->r_barrel & $crossbow->receiver>=$crossbow->r_receiver & $crossbow->grip>=$crossbow->r_grip & $crossbow->string>=$crossbow->r_string) text-success @else text-white @endif">{{ $crossbow->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->blueprint < $crossbow->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $crossbow->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.grip" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->grip < $crossbow->r_grip)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $crossbow->r_grip }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.string" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->string < $crossbow->r_string)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $crossbow->r_string }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->barrel < $crossbow->r_barrel)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $crossbow->r_barrel }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->receiver < $crossbow->r_receiver)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $crossbow->r_receiver }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('crossbow_btn').click();" type="checkbox" wire:model.defer="crossbow.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($crossbow->owned)?'success':'danger' }}" @if($crossbow->owned) checked @endif>
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