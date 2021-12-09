<form wire:submit.prevent="update_user_shotgun">
    @csrf
    <div class="d-flex justify-content-between my-3">
        <h1 class="m-0">@lang('Shotguns')</h1>
        <input id="shotgun_btn" type="submit" class="btn btn-warning my-auto fw-bold d-none" value="@lang('Update')">
    </div>
    <table class="table table-dark table-responsive table-hover mx-auto">
        <thead>
        <tr class="text-warning">
            <th scope="col">@lang('Name')</th>
            <th scope="col">@lang('Blueprint')</th>
            <th scope="col">@lang('Barrel')</th> 
            <th scope="col">@lang('Receiver')</th>
            <th scope="col">@lang('Stock')</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($shotguns as $shotgun)
                <input type="hidden" wire:model="id_shotgun.{{ $loop->index }}">
                <tr>
                    <th scope="row">{{ $shotgun->name }} Prime</th>
                    <td>
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->blueprint < $shotgun->r_blueprint)?"danger":"success" }}">
                        / {{ $shotgun->r_blueprint }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="barrel.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->barrel < $shotgun->r_barrel)?"danger":"success" }}">
                        / {{ $shotgun->r_barrel }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="receiver.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->receiver < $shotgun->r_receiver)?"danger":"success" }}">
                        / {{ $shotgun->r_receiver }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="stock.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->stock < $shotgun->r_stock)?"danger":"success" }}">
                        / {{ $shotgun->r_stock }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>You</th>
                    <th>don't</th>
                    <th>have</th>
                    <th>any</th>
                    <th>shotgun</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</form>

