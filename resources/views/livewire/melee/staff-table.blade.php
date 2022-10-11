<div class="row m-0" id="staff">
    @if(count($staffs)>0)
        <div class="mx-auto rounded table-responsive mb-3">
        <form wire:submit.prevent="update_user_staff">
            @csrf
            <input id="staff_btn" type="submit" class="d-none" value="@lang('Update')">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr class="text-warning">
                    <th scope="col">@lang('Staff')</th>
                    <th scope="col" class="text-center">@lang('Blueprint')</th>
                    <th scope="col" class="text-center">@lang('Ornament')</th> 
                    <th scope="col" class="text-center">@lang('Handle')</th>
                    <th scope="col" class="text-center">@lang('Owned')</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($staffs as $staff)
                        <input type="hidden" wire:model="id_staff.{{ $loop->index }}">
                        <tr>
                            <th id="{{$staff->name}}%20Prime" scope="row" class="prime-item col-6 @if($staff->blueprint>=$staff->r_blueprint & $staff->ornament>=$staff->r_ornament & $staff->handle>=$staff->r_handle) text-success @else text-white @endif">{{ $staff->name }} Prime</th>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('staff_btn').click();" type="number" wire:model.defer="staff.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($staff->blueprint < $staff->r_blueprint)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $staff->r_blueprint }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('staff_btn').click();" type="number" wire:model.defer="staff.{{$loop->index}}.ornament" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($staff->ornament < $staff->r_ornament)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $staff->r_ornament }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input min="0" onchange="document.getElementById('staff_btn').click();" type="number" wire:model.defer="staff.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($staff->handle < $staff->r_handle)?"danger":"success" }}">
                                <p class="d-none d-sm-inline">/ {{ $staff->r_handle }}</p>
                            </td>
                            <td class="col-2 text-center">
                                <input onchange="document.getElementById('staff_btn').click();" type="checkbox" wire:model.defer="staff.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($staff->owned)?'success':'danger' }}" @if($staff->owned) checked @endif>
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