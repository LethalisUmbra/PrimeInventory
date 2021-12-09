<form wire:submit.prevent="update_user_bow">
    @csrf
    <div class="d-flex justify-content-between my-3">
        <h1 class="m-0">@lang('Bows')</h1>
        <input id="bow_btn" type="submit" class="btn btn-warning my-auto fw-bold d-none" value="@lang('Update')">
    </div>
    <table class="table table-dark table-responsive table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Name')</th>
            <th scope="col">@lang('Blueprint')</th>
            <th scope="col">@lang('Upper Limb')</th> 
            <th scope="col">@lang('Lower Limb')</th> 
            <th scope="col">@lang('Grip')</th>
            <th scope="col">@lang('String')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($bows as $bow)
                <input type="hidden" wire:model="id_bow.{{ $loop->index }}">
                <tr>
                    <th scope="row">{{ $bow->name }} Prime</th>
                    <td>
                        <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->blueprint < $bow->r_blueprint)?"danger":"success" }}">
                        / {{ $bow->r_blueprint }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="upper_limb.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->upper_limb < $bow->r_upper_limb)?"danger":"success" }}">
                        / {{ $bow->r_upper_limb }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="lower_limb.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->lower_limb < $bow->r_lower_limb)?"danger":"success" }}">
                        / {{ $bow->r_lower_limb }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="grip.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->grip < $bow->r_grip)?"danger":"success" }}">
                        / {{ $bow->r_grip }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="string.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->string < $bow->r_string)?"danger":"success" }}">
                        / {{ $bow->r_string }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>You</th>
                    <th>don't</th>
                    <th>have</th>
                    <th>any</th>
                    <th>bow</th>
                    <th>here</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</form>

