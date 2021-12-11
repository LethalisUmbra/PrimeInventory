<form wire:submit.prevent="update_user_thrown">
    @csrf
    <input id="thrown_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Thrown')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Pouch')</th> 
            <th scope="col" class="text-center">@lang('Blade')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($throwns as $thrown)
                <input type="hidden" wire:model="id_thrown.{{ $loop->index }}">
                <tr>
                    <th scope="row" class="col-6 @if($thrown->blueprint>=$thrown->r_blueprint & $thrown->pouch>=$thrown->r_pouch & $thrown->blade>=$thrown->r_blade) text-success @else text-white @endif">{{ $thrown->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('thrown_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($thrown->blueprint < $thrown->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $thrown->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('thrown_btn').click();" type="number" wire:model.defer="pouch.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($thrown->pouch < $thrown->r_pouch)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $thrown->r_pouch }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('thrown_btn').click();" type="number" wire:model.defer="blade.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($thrown->blade < $thrown->r_blade)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $thrown->r_blade }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('thrown_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($thrown->owned)?'success':'danger' }}" @if($thrown->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

