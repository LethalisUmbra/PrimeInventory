<form wire:submit.prevent="update_user_rifle">
    @csrf
    <div class="d-flex justify-content-between my-3">
        <h1 class="m-0">Rifles</h1>
        <input id="rifle_btn" type="submit" class="btn btn-warning my-auto fw-bold d-none" value="@lang('Update')">
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
            @forelse ($rifles as $rifle)
                <input type="hidden" wire:model="id_rifle.{{ $loop->index }}">
                <tr>
                    <th scope="row">{{ $rifle->name }} Prime</th>
                    <td>
                        <input min="0" onchange="document.getElementById('rifle_btn').click();" type="number" wire:model.defer="blueprint.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white  text-end shadow-none border border-{{ ($rifle->blueprint < $rifle->r_blueprint)?"danger":"success" }}">
                        / {{ $rifle->r_blueprint }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('rifle_btn').click();" type="text" wire:model.defer="barrel.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white  text-end shadow-none border border-{{ ($rifle->barrel < $rifle->r_barrel)?"danger":"success" }}">
                        / {{ $rifle->r_barrel }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('rifle_btn').click();" type="text" wire:model.defer="receiver.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white  text-end shadow-none border border-{{ ($rifle->receiver < $rifle->r_receiver)?"danger":"success" }}">
                        / {{ $rifle->r_receiver }}
                    </td>
                    <td>
                        <input min="0" onchange="document.getElementById('rifle_btn').click();" type="text" wire:model.defer="stock.{{$loop->index}}" style="width:30px" class="rounded bg-transparent text-white  text-end shadow-none border border-{{ ($rifle->stock < $rifle->r_stock)?"danger":"success" }}">
                        / {{ $rifle->r_stock }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th>You</th>
                    <th>don't</th>
                    <th>have</th>
                    <th>any</th>
                    <th>rifle</th>
                </tr>
            @endforelse
        </tbody>
    </table>
</form>