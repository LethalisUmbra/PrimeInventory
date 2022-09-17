<div>
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input id="filter_melee" wire:model="filter" type="text" placeholder="@lang('Seach Weapon')" class="form-control"/>
    </div>

    {{-- Melee --}}
    @if (count($melees)>0)
    <div class="row m-0 mb-3" id="melee">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_melee">
                @csrf
                <input id="melee_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Melee')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Blade')</th> 
                        <th scope="col" class="text-center">@lang('Handle')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($melees as $melee)
                        <input type="hidden" wire:model="_melee.id.{{ $loop->index }}">
                            <tr>
                                <th id="{{ $melee->name }}%20Prime" scope="row" class="prime-item col-6 @if($melee->blueprint>=$melee->r_blueprint & $melee->blade>=$melee->r_blade & $melee->handle>=$melee->r_handle) text-success @else text-white @endif">{{ __($melee->name) }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blueprint < $melee->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $melee->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->blade < $melee->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $melee->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('melee_btn').click();" type="number" wire:model.defer="melee.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($melee->handle < $melee->r_handle)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $melee->r_handle }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('melee_btn').click();" type="checkbox" wire:model.defer="melee.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($melee->owned)?'success':'danger' }}" @if($melee->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    @endif

    {{-- Fist --}}
    @if (count($fists)>0)
    <div class="row m-0 mb-3" id="fist">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_fist">
                @csrf
                <input id="fist_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Fist')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Blade')</th> 
                        <th scope="col" class="text-center">@lang('Gauntlet')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($fists as $fist)
                            <input type="hidden" wire:model="id_fist.{{ $loop->index }}">
                            <tr>
                                <th id="{{$fist->name}}%20Prime" scope="row" class="prime-item col-6 @if($fist->blueprint>=$fist->r_blueprint & $fist->blade>=$fist->r_blade & $fist->gauntlet>=$fist->r_gauntlet) text-success @else text-white @endif">{{ $fist->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->blueprint < $fist->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $fist->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->blade < $fist->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $fist->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('fist_btn').click();" type="number" wire:model.defer="fist.{{$loop->index}}.gauntlet" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($fist->gauntlet < $fist->r_gauntlet)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $fist->r_gauntlet }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('fist_btn').click();" type="checkbox" wire:model.defer="fist.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($fist->owned)?'success':'danger' }}" @if($fist->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    @endif

    {{-- Staffs --}}
    @if(count($staffs)>0)
    <div class="row m-0 mb-3" id="staff">
        <div class="mx-auto rounded table-responsive">
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
    </div>
    @endif

    {{-- Hammer --}}
    @if(count($hammers)>0)
    <div class="row m-0 mb-3" id="hammer">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_hammer">
                @csrf
                <input id="hammer_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Hammer')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Head')</th> 
                        <th scope="col" class="text-center">@lang('Handle')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($hammers as $hammer)
                            <input type="hidden" wire:model="id_hammer.{{ $loop->index }}">
                            <tr>
                                <th id="{{$hammer->name}}%20Prime" scope="row" class="prime-item col-6 @if($hammer->blueprint>=$hammer->r_blueprint & $hammer->head>=$hammer->r_head & $hammer->handle>=$hammer->r_handle) text-success @else text-white @endif">{{ $hammer->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="hammer.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->blueprint < $hammer->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $hammer->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="hammer.{{$loop->index}}.head" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->head < $hammer->r_head)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $hammer->r_head }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('hammer_btn').click();" type="number" wire:model.defer="hammer.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($hammer->handle < $hammer->r_handle)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $hammer->r_handle }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('hammer_btn').click();" type="checkbox" wire:model.defer="hammer.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($hammer->owned)?'success':'danger' }}" @if($hammer->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>            
        </div>
    </div>
    @endif

    {{-- Glaive --}}
    @if(count($glaives)>0)
    <div class="row m-0 mb-3" id="glaive">
        <div class="mx-auto rounded table-responsive">
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
                                    <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="glaive.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->blueprint < $glaive->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $glaive->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="glaive.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->blade < $glaive->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $glaive->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('glaive_btn').click();" type="number" wire:model.defer="glaive.{{$loop->index}}.disc" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($glaive->disc < $glaive->r_disc)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $glaive->r_disc }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('glaive_btn').click();" type="checkbox" wire:model.defer="glaive.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($glaive->owned)?'success':'danger' }}" @if($glaive->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>            
        </div>
    </div>
    @endif

    {{-- Sparring --}}
    @if(count($sparrings)>0)
    <div class="row m-0 mb-3" id="sparring">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_sparring">
                @csrf
                <input id="sparring_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Sparring')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Gauntlet')</th> 
                        <th scope="col" class="text-center">@lang('Boot')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($sparrings as $sparring)
                            <input type="hidden" wire:model="id_sparring.{{ $loop->index }}">
                            <tr>
                                <th id="{{$sparring->name}}%20Prime" scope="row" class="prime-item col-6 @if($sparring->blueprint>=$sparring->r_blueprint & $sparring->gauntlet>=$sparring->r_gauntlet & $sparring->boot>=$sparring->r_boot) text-success @else text-white @endif">{{ $sparring->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->blueprint < $sparring->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sparring->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.gauntlet" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->gauntlet < $sparring->r_gauntlet)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sparring->r_gauntlet }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sparring_btn').click();" type="number" wire:model.defer="sparring.{{$loop->index}}.boot" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sparring->boot < $sparring->r_boot)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sparring->r_boot }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('sparring_btn').click();" type="checkbox" wire:model.defer="sparring.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sparring->owned)?'success':'danger' }}" @if($sparring->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>            
        </div>
    </div>
    @endif

    {{-- Nikana --}}
    @if(count($nikanas)>0)
    <div class="row m-0 mb-3" id="nikana">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_nikana">
                @csrf
                <input id="nikana_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Nikana')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Blade')</th> 
                        <th scope="col" class="text-center">@lang('Hilt')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($nikanas as $nikana)
                            <input type="hidden" wire:model="id_nikana.{{ $loop->index }}">
                            <tr>
                                <th id="{{$nikana->name}}%20Prime" scope="row" class="prime-item col-6 @if($nikana->blueprint>=$nikana->r_blueprint & $nikana->blade>=$nikana->r_blade & $nikana->hilt>=$nikana->r_hilt) text-success @else text-white @endif">{{ $nikana->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->blueprint < $nikana->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nikana->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->blade < $nikana->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nikana->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nikana_btn').click();" type="number" wire:model.defer="nikana.{{$loop->index}}.hilt" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nikana->hilt < $nikana->r_hilt)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nikana->r_hilt }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('nikana_btn').click();" type="checkbox" wire:model.defer="nikana.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($nikana->owned)?'success':'danger' }}" @if($nikana->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    @endif

    {{-- Nunchaku --}}
    @if(count($nunchakus)>0)
    <div class="row m-0 mb-3" id="nunchaku">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_nunchaku">
                @csrf
                <input id="nunchaku_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Nunchaku')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Handle')</th> 
                        <th scope="col" class="text-center">@lang('Chain')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($nunchakus as $nunchaku)
                            <input type="hidden" wire:model="id_nunchaku.{{ $loop->index }}">
                            <tr>
                                <th id="{{$nunchaku->name}}%20Prime" scope="row" class="prime-item col-6 @if($nunchaku->blueprint>=$nunchaku->r_blueprint & $nunchaku->handle>=$nunchaku->r_handle & $nunchaku->chain>=$nunchaku->r_chain) text-success @else text-white @endif">{{ $nunchaku->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="nunchaku.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->blueprint < $nunchaku->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nunchaku->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="nunchaku.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->handle < $nunchaku->r_handle)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nunchaku->r_handle }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('nunchaku_btn').click();" type="number" wire:model.defer="nunchaku.{{$loop->index}}.chain" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($nunchaku->chain < $nunchaku->r_chain)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $nunchaku->r_chain }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('nunchaku_btn').click();" type="checkbox" wire:model.defer="nunchaku.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($nunchaku->owned)?'success':'danger' }}" @if($nunchaku->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    @endif

    {{-- Swordshield --}}
    @if(count($swordshields)>0)
    <div class="row m-0 mb-3" id="sword_shield">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_sword_shield">
                @csrf
                <input id="sword_shield_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto mt-3">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Sword & Shield')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Blade')</th> 
                        <th scope="col" class="text-center">@lang('Guard')</th>
                        <th scope="col" class="text-center">@lang('Hilt')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($swordshields as $sword_shield)
                            <input type="hidden" wire:model="id_sword_shield.{{ $loop->index }}">
                            <tr>
                                <th id="{{$sword_shield->name}}%20Prime" scope="row" class="prime-item col-4 @if($sword_shield->blueprint>=$sword_shield->r_blueprint & $sword_shield->blade>=$sword_shield->r_blade & $sword_shield->guard>=$sword_shield->r_guard & $sword_shield->hilt>=$sword_shield->r_hilt) text-success @else text-white @endif">{{ $sword_shield->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->blueprint < $sword_shield->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sword_shield->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->blade < $sword_shield->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sword_shield->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.guard" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->guard < $sword_shield->r_guard)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sword_shield->r_guard }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('sword_shield_btn').click();" type="number" wire:model.defer="swordshield.{{$loop->index}}.hilt" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($sword_shield->hilt < $sword_shield->r_hilt)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $sword_shield->r_hilt }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('sword_shield_btn').click();" type="checkbox" wire:model.defer="swordshield.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($sword_shield->owned)?'success':'danger' }}" @if($sword_shield->owned) checked @endif>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    @endif
</div>