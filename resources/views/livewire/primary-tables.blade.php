<div>
    <div class="row m-0 mb-3" style="padding: 12px;">
        <input id="filter_primary" wire:model="filter" type="text" placeholder="@lang('Seach Weapon')" class="form-control"/>
    </div>

    @if(count($rifles)>0)
    <div class="row m-0 mb-3" id="rifle">
        <div class="mx-auto rounded table-responsive">
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
        </div>
    </div>
    @endif

    @if(count($shotguns)>0)
    <div class="row m-0 mb-3" id="shotgun">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_shotgun">
                @csrf
                <input id="shotgun_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Shotgun')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Barrel')</th> 
                        <th scope="col" class="text-center">@lang('Receiver')</th>
                        <th scope="col" class="text-center">@lang('Stock')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($shotguns as $shotgun)
                            <input type="hidden" wire:model="id_shotgun.{{ $loop->index }}">
                            <tr>
                                <th id="{{$shotgun->name}}%20Prime" scope="row" class="prime-item col-4 @if($shotgun->blueprint>=$shotgun->r_blueprint & $shotgun->barrel>=$shotgun->r_barrel & $shotgun->receiver>=$shotgun->r_receiver & $shotgun->stock>=$shotgun->r_stock) text-success @else text-white @endif">{{ $shotgun->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="shotgun.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->blueprint < $shotgun->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $shotgun->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="shotgun.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->barrel < $shotgun->r_barrel)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $shotgun->r_barrel }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="shotgun.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->receiver < $shotgun->r_receiver)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $shotgun->r_receiver }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('shotgun_btn').click();" type="number" wire:model.defer="shotgun.{{$loop->index}}.stock" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($shotgun->stock < $shotgun->r_stock)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $shotgun->r_stock }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('shotgun_btn').click();" type="checkbox" wire:model.defer="shotgun.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($shotgun->owned)?'success':'danger' }}" @if($shotgun->owned) checked @endif>
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

    @if(count($bows)>0)
    <div class="row m-0 mb-3" id="bow">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_bow">
                @csrf
                <input id="bow_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Bow')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Upper Limb')</th> 
                        <th scope="col" class="text-center">@lang('Lower Limb')</th> 
                        <th scope="col" class="text-center">@lang('Grip')</th>
                        <th scope="col" class="text-center">@lang('String')</th>
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($bows as $bow)
                            <input type="hidden" wire:model="id_bow.{{ $loop->index }}">
                            <tr>
                                <th id="{{$bow->name}}%20Prime" scope="row" class="prime-item col-2 @if($bow->blueprint>=$bow->r_blueprint & $bow->upper_limb>=$bow->r_upper_limb & $bow->lower_limb>=$bow->r_lower_limb & $bow->grip>=$bow->r_grip & $bow->string>=$bow->r_string) text-success @else text-white @endif">{{ $bow->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->blueprint < $bow->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $bow->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.upper_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->upper_limb < $bow->r_upper_limb)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $bow->r_upper_limb }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.lower_limb" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->lower_limb < $bow->r_lower_limb)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $bow->r_lower_limb }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.grip" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->grip < $bow->r_grip)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $bow->r_grip }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('bow_btn').click();" type="number" wire:model.defer="bow.{{$loop->index}}.string" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($bow->string < $bow->r_string)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $bow->r_string }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('bow_btn').click();" type="checkbox" wire:model.defer="bow.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($bow->owned)?'success':'danger' }}" @if($bow->owned) checked @endif>
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

    @if(count($crossbow)>0)
    <div class="row m-0 mb-3" id="crossbow">
        <div class="mx-auto rounded table-responsive">
            <form wire:submit.prevent="update_user_crossbow">
                @csrf
                <input id="crossbow_btn" type="submit" class="d-none" value="@lang('Update')">
                <table class="table table-dark table-hover mx-auto">
                    <thead>
                    <tr class="text-warning">
                        <th scope="col">@lang('Crossbow')</th>
                        <th scope="col" class="text-center">@lang('Blueprint')</th>
                        <th scope="col" class="text-center">@lang('Grip')</th>
                        <th scope="col" class="text-center">@lang('String')</th>
                        <th scope="col" class="text-center">@lang('Barrel')</th> 
                        <th scope="col" class="text-center">@lang('Receiver')</th> 
                        <th scope="col" class="text-center">@lang('Owned')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($crossbows as $crossbow)
                            <input type="hidden" wire:model="id_crossbow.{{ $loop->index }}">
                            <tr>
                                <th id="{{$crossbow->name}}%20Prime" scope="row" class="prime-item col-2 @if($crossbow->blueprint>=$crossbow->r_blueprint & $crossbow->barrel>=$crossbow->r_barrel & $crossbow->receiver>=$crossbow->r_receiver & $crossbow->grip>=$crossbow->r_grip & $crossbow->string>=$crossbow->r_string) text-success @else text-white @endif">{{ $crossbow->name }} Prime</th>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->blueprint < $crossbow->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $crossbow->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.grip" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->grip < $crossbow->r_grip)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $crossbow->r_grip }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.string" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->string < $crossbow->r_string)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $crossbow->r_string }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->barrel < $crossbow->r_barrel)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $crossbow->r_barrel }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('crossbow_btn').click();" type="number" wire:model.defer="crossbow.{{$loop->index}}.receiver" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($crossbow->receiver < $crossbow->r_receiver)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $crossbow->r_receiver }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('crossbow_btn').click();" type="checkbox" wire:model.defer="crossbow.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($crossbow->owned)?'success':'danger' }}" @if($crossbow->owned) checked @endif>
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

    @if(count($speargun)>0)
    <div class="row m-0 mb-3" id="speargun">
        <div class="mx-auto rounded table-responsive">
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
                                    <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="speargun.{{$loop->index}}.blueprint" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->blueprint < $speargun->r_blueprint)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $speargun->r_blueprint }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="speargun.{{$loop->index}}.barrel" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->barrel < $speargun->r_barrel)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $speargun->r_barrel }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="speargun.{{$loop->index}}.blade" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->blade < $speargun->r_blade)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $speargun->r_blade }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input min="0" onchange="document.getElementById('speargun_btn').click();" type="number" wire:model.defer="speargun.{{$loop->index}}.handle" style="width:20px" class="d-inline rounded bg-transparent text-white text-end pe-1 shadow-none border border-{{ ($speargun->handle < $speargun->r_handle)?"danger":"success" }}">
                                    <p class="d-none d-sm-inline">/ {{ $speargun->r_handle }}</p>
                                </td>
                                <td class="col-2 text-center">
                                    <input onchange="document.getElementById('speargun_btn').click();" type="checkbox" wire:model.defer="speargun.{{$loop->index}}.owned" class="form-check-input fs-5 m-0 bg-transparent border border-{{ ($speargun->owned)?'success':'danger' }}" @if($speargun->owned) checked @endif>
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