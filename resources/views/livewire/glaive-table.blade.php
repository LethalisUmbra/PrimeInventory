<form wire:submit.prevent="update_user_glaive">
    @csrf
    <input id="glaive_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Glaive')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Blade')</th> 
            <th scope="col" class="text-center">@lang('Disc')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($glaives as $glaive)
                <input type="hidden" wire:model="id_glaive.{{ $loop->index }}">
                <tr>
                    <th id="{{$glaive->name}}%20Prime" scope="row" class="prime-item col-6 @if($glaive->blueprint>=$glaive->r_blueprint & $glaive->blade>=$glaive->r_blade & $glaive->disc>=$glaive->r_disc) text-success @else text-white @endif">{{ $glaive->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->blueprint < $glaive->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $glaive->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="blade.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->blade < $glaive->r_blade)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $glaive->r_blade }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="disc.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->disc < $glaive->r_disc)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $glaive->r_disc }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('glaive_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($glaive->owned)?'success':'danger' }}" @if($glaive->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

