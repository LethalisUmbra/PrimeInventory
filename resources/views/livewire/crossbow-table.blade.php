<form wire:submit.prevent="update_user_crossbow">
    @csrf
    <div class="d-flex justify-content-between my-3">
        <h1 class="m-0">@lang('Crossbows')</h1>
        <input id="crossbow_btn" type="submit" class="btn btn-warning my-auto fw-bold d-none" value="@lang('Update')">
    </div>
    <table class="table table-dark table-responsive table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Name')</th>
            <th scope="col">@lang('Blueprint')</th>
            <th scope="col">@lang('Grip')</th>
            <th scope="col">@lang('String')</th>
            <th scope="col">@lang('Barrel')</th> 
            <th scope="col">@lang('Receiver')</th> 
        </tr>
        </thead>
        <tbody>
            @forelse ($crossbows as $crossbow)
                <input type="hidden" wire:model="id_crossbow.{{ $loop->index }}">
                <tr>
                    <th scope="row">{{ $crossbow->name }} Prime</th>
                    <td>
                        <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->blueprint < $crossbow->r_blueprint)?"danger":"success" }}">
                        / {{ $crossbow->r_blueprint }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="grip.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->grip < $crossbow->r_grip)?"danger":"success" }}">
                        / {{ $crossbow->r_grip }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="string.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->string < $crossbow->r_string)?"danger":"success" }}">
                        / {{ $crossbow->r_string }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->barrel < $crossbow->r_barrel)?"danger":"success" }}">
                        / {{ $crossbow->r_barrel }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->receiver < $crossbow->r_receiver)?"danger":"success" }}">
                        / {{ $crossbow->r_receiver }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>You</th>
                    <th>don't</th>
                    <th>have</th>
                    <th>any</th>
                    <th>crossbow</th>
                    <th>here</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</form>

