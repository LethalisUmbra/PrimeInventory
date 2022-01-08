<form wire:submit.prevent="update_user_speargun">
    @csrf
    <input id="speargun_btn" type="submit" class="d-none" value="@lang('Update')">
    <table class="table table-dark table-hover mx-auto mt-3">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Speargun')</th>
            <th scope="col" class="text-center">@lang('Blueprint')</th>
            <th scope="col" class="text-center">@lang('Barrel')</th>
            <th scope="col" class="text-center">@lang('Blade')</th> 
            <th scope="col" class="text-center">@lang('Handle')</th>
            <th scope="col" class="text-center">@lang('Owned')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($spearguns as $speargun)
                <input type="hidden" wire:model="id_speargun.{{ $loop->index }}">
                <tr>
                    <th id="{{$speargun->name}}%20Prime" scope="row" class="prime-item col-4 @if($speargun->blueprint>=$speargun->r_blueprint & $speargun->blade>=$speargun->r_blade & $speargun->barrel>=$speargun->r_barrel & $speargun->handle>=$speargun->r_handle) text-success @else text-white @endif">{{ $speargun->name }} Prime</th>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->blueprint < $speargun->r_blueprint)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $speargun->r_blueprint }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->barrel < $speargun->r_barrel)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $speargun->r_barrel }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="blade.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->blade < $speargun->r_blade)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $speargun->r_blade }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="handle.{{$loop->index}}" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->handle < $speargun->r_handle)?"danger":"success" }}">
                        <p class="d-none d-sm-inline">/ {{ $speargun->r_handle }}</p>
                    </td>
                    <td class="col-2 text-center">
                        <input onchange="document.getElementById('speargun_btn').click();" type="checkbox" wire:model.defer="owned.{{$loop->index}}" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($speargun->owned)?'success':'danger' }}" @if($speargun->owned) checked @endif>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</form>

