<div class="row m-0" id="pistol">
    @if(count($pistols)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_pistol">
            @csrf
            <input id="pistol_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Pistol')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Barrel')</th> 
                    <th scope="col" class="text-center">@lang('Receiver')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($pistols as $pistol)
                        <input type="hidden" wire:model="pistol.{{ $loop->index }}.id">
                        <tr>
                            <th id="{{$pistol->name}}%20Prime" role="button" scope="row" class="prime-item col-6 @if($pistol->blueprint>=$pistol->r_blueprint & $pistol->barrel>=$pistol->r_barrel & $pistol->receiver>=$pistol->r_receiver) text-success @else text-white @endif">{{ $pistol->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('pistol_btn').click();" type="number" wire:model.defer="pistol.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($pistol->blueprint < $pistol->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $pistol->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('pistol_btn').click();" type="number" wire:model.defer="pistol.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($pistol->barrel < $pistol->r_barrel)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $pistol->r_barrel }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('pistol_btn').click();" type="number" wire:model.defer="pistol.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($pistol->receiver < $pistol->r_receiver)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $pistol->r_receiver }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('pistol_btn').click();" type="checkbox" wire:model.defer="pistol.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($pistol->owned)?'success':'danger' }}" @if($pistol->owned) checked @endif>
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
