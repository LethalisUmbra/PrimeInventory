<div>
    @if(count($rifles)>0)
    <form wire:submit.prevent="update_user_rifle">
        @csrf
        <input id="rifle_btn" type="submit" class="d-none">
        <table class="table table-dark table-hover mx-auto">
            <thead>
            <tr class="text-warning">
                <th scope="col">@lang('Rifle')</th>
                <th scope="col" class="text-center">@lang('Blueprint')</th>
                <th scope="col" class="text-center">@lang('Barrel')</th> 
                <th scope="col" class="text-center">@lang('Receiver')</th>
                <th scope="col" class="text-center">@lang('Stock')</th>
                <th scope="col" class="text-center">@lang('Owned')</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($rifles as $rifle)
                    <input type="hidden" wire:model="rifle.{{ $loop->index }}.id">
                    <tr>
                        <th id="{{$rifle->name}}%20Prime" scope="row" class="prime-item col-4 @if($rifle->blueprint>=$rifle->r_blueprint & $rifle->barrel>=$rifle->r_barrel & $rifle->receiver>=$rifle->r_receiver & $rifle->stock>=$rifle->r_stock) text-success @else text-white @endif">{{ $rifle->name }} Prime</th>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('rifle_btn').click();" type="number" wire:model.defer="rifle.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($rifle->blueprint < $rifle->r_blueprint)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $rifle->r_blueprint }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('rifle_btn').click();" type="number" wire:model.defer="rifle.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($rifle->barrel < $rifle->r_barrel)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $rifle->r_barrel }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('rifle_btn').click();" type="number" wire:model.defer="rifle.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($rifle->receiver < $rifle->r_receiver)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $rifle->r_receiver }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input min="0" onchange="document.getElementById('rifle_btn').click();" type="number" wire:model.defer="rifle.{{$loop->index}}.stock" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($rifle->stock < $rifle->r_stock)?"danger":"success" }}">
                            <p class="d-none d-sm-inline">/ {{ $rifle->r_stock }}</p>
                        </td>
                        <td class="col-2 text-center">
                            <input onchange="document.getElementById('rifle_btn').click();" type="checkbox" wire:model.defer="rifle.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($rifle->owned)?'success':'danger' }}" @if($rifle->owned) checked @endif>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </form>
    @endif
</div>