<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserMelee;
use App\Models\UserFist;
use App\Models\UserStaff;
use App\Models\UserHammer;
use App\Models\UserGlaive;
use App\Models\UserSparring;
use App\Models\UserNikana;
use App\Models\UserNunchaku;
use App\Models\UserSwordShield;
use Auth;

class MeleeTables extends Component
{
    public $filter;

    public $melee = [];
    public $fist = [];
    public $staff = [];
    public $hammer = [];
    public $glaive = [];

    public $sparring = [];
    public $nikana = [];
    public $nunchaku = [];
    public $swordshield = [];

    public function render()
    {
        // Melees
        $melees = DB::table('user_melees as ub')
                -> join('melees as b', 'ub.melee_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($melees); $i++)
        {
            $this->melee[$i]['id'] = $melees[$i]->id;
            $this->melee[$i]['name'] = $melees[$i]->name;
            $this->melee[$i]['owned'] = $melees[$i]->owned;
            $this->melee[$i]['blueprint'] = $melees[$i]->blueprint;
            $this->melee[$i]['r_blueprint'] = $melees[$i]->r_blueprint;
            $this->melee[$i]['blade'] = $melees[$i]->blade;
            $this->melee[$i]['r_blade'] = $melees[$i]->r_blade;
            $this->melee[$i]['handle'] = $melees[$i]->handle;
            $this->melee[$i]['r_handle'] = $melees[$i]->r_handle;
        }

        // Fists
        $fists = DB::table('user_fists as ur')
                -> join('fists as f', 'ur.fist_id','=','f.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('f.id as id', 'f.name as name', 'ur.owned as owned',
                        'f.blueprint as r_blueprint', 'f.blade as r_blade', 'f.gauntlet as r_gauntlet',
                        'ur.blueprint as blueprint', 'ur.blade as blade', 'ur.gauntlet as gauntlet')
                ->where('ur.user_id','=',Auth::user()->id)->where('f.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($fists); $i++)
        {
            $this->fist[$i]['id'] = $fists[$i]->id;
            $this->fist[$i]['name'] = $fists[$i]->name;
            $this->fist[$i]['owned'] = $fists[$i]->owned;
            $this->fist[$i]['blueprint'] = $fists[$i]->blueprint;
            $this->fist[$i]['r_blueprint'] = $fists[$i]->r_blueprint;
            $this->fist[$i]['blade'] = $fists[$i]->blade;
            $this->fist[$i]['r_blade'] = $fists[$i]->r_blade;
            $this->fist[$i]['gauntlet'] = $fists[$i]->gauntlet;
            $this->fist[$i]['r_gauntlet'] = $fists[$i]->r_gauntlet;
        }

        // Staffs
        $staffs = DB::table('user_staffs as ub')
                -> join('staffs as b', 'ub.staff_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.ornament as r_ornament', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.ornament as ornament', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($staffs); $i++)
        {
            $this->staff[$i]['id'] = $staffs[$i]->id;
            $this->staff[$i]['name'] = $staffs[$i]->name;
            $this->staff[$i]['owned'] = $staffs[$i]->owned;
            $this->staff[$i]['blueprint'] = $staffs[$i]->blueprint;
            $this->staff[$i]['r_blueprint'] = $staffs[$i]->r_blueprint;
            $this->staff[$i]['ornament'] = $staffs[$i]->ornament;
            $this->staff[$i]['r_ornament'] = $staffs[$i]->r_ornament;
            $this->staff[$i]['handle'] = $staffs[$i]->handle;
            $this->staff[$i]['r_handle'] = $staffs[$i]->r_handle;
        }

        // Hammer
        $hammers = DB::table('user_hammers as ub')
                -> join('hammers as b', 'ub.hammer_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.head as r_head', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.head as head', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($hammers); $i++)
        {
            $this->hammer[$i]['id'] = $hammers[$i]->id;
            $this->hammer[$i]['name'] = $hammers[$i]->name;
            $this->hammer[$i]['owned'] = $hammers[$i]->owned;
            $this->hammer[$i]['blueprint'] = $hammers[$i]->blueprint;
            $this->hammer[$i]['r_blueprint'] = $hammers[$i]->r_blueprint;
            $this->hammer[$i]['head'] = $hammers[$i]->head;
            $this->hammer[$i]['r_head'] = $hammers[$i]->r_head;
            $this->hammer[$i]['handle'] = $hammers[$i]->handle;
            $this->hammer[$i]['r_handle'] = $hammers[$i]->r_handle;
        }

        // Glaives
        $glaives = DB::table('user_glaives as ub')
                -> join('glaives as b', 'ub.glaive_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.disc as r_disc',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.disc as disc')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($glaives); $i++)
        {
            $this->glaive[$i]['id'] = $glaives[$i]->id;
            $this->glaive[$i]['name'] = $glaives[$i]->name;
            $this->glaive[$i]['owned'] = $glaives[$i]->owned;
            $this->glaive[$i]['blueprint'] = $glaives[$i]->blueprint;
            $this->glaive[$i]['r_blueprint'] = $glaives[$i]->r_blueprint;
            $this->glaive[$i]['blade'] = $glaives[$i]->blade;
            $this->glaive[$i]['r_blade'] = $glaives[$i]->r_blade;
            $this->glaive[$i]['disc'] = $glaives[$i]->disc;
            $this->glaive[$i]['r_disc'] = $glaives[$i]->r_disc;
        }

        // Sparrings
        $sparrings = DB::table('user_sparrings as ub')
                -> join('sparrings as b', 'ub.sparring_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.gauntlet as r_gauntlet', 'b.boot as r_boot',
                        'ub.blueprint as blueprint', 'ub.gauntlet as gauntlet', 'ub.boot as boot')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($sparrings); $i++)
        {
            $this->sparring[$i]['id'] = $sparrings[$i]->id;
            $this->sparring[$i]['name'] = $sparrings[$i]->name;
            $this->sparring[$i]['owned'] = $sparrings[$i]->owned;
            $this->sparring[$i]['blueprint'] = $sparrings[$i]->blueprint;
            $this->sparring[$i]['r_blueprint'] = $sparrings[$i]->r_blueprint;
            $this->sparring[$i]['gauntlet'] = $sparrings[$i]->gauntlet;
            $this->sparring[$i]['r_gauntlet'] = $sparrings[$i]->r_gauntlet;
            $this->sparring[$i]['boot'] = $sparrings[$i]->boot;
            $this->sparring[$i]['r_boot'] = $sparrings[$i]->r_boot;
        }

        // Nikanas
        $nikanas = DB::table('user_nikanas as ub')
                -> join('nikanas as b', 'ub.nikana_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.hilt as r_hilt',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.hilt as hilt')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($nikanas); $i++)
        {
            $this->nikana[$i]['id'] = $nikanas[$i]->id;
            $this->nikana[$i]['name'] = $nikanas[$i]->name;
            $this->nikana[$i]['owned'] = $nikanas[$i]->owned;
            $this->nikana[$i]['blueprint'] = $nikanas[$i]->blueprint;
            $this->nikana[$i]['r_blueprint'] = $nikanas[$i]->r_blueprint;
            $this->nikana[$i]['blade'] = $nikanas[$i]->blade;
            $this->nikana[$i]['r_blade'] = $nikanas[$i]->r_blade;
            $this->nikana[$i]['hilt'] = $nikanas[$i]->hilt;
            $this->nikana[$i]['r_hilt'] = $nikanas[$i]->r_hilt;
        }

        // Nunchakus
        $nunchakus = DB::table('user_nunchakus as ub')
                -> join('nunchakus as b', 'ub.nunchaku_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.handle as r_handle', 'b.chain as r_chain',
                        'ub.blueprint as blueprint', 'ub.handle as handle', 'ub.chain as chain')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($nunchakus); $i++)
        {
            $this->nunchaku[$i]['id'] = $nunchakus[$i]->id;
            $this->nunchaku[$i]['name'] = $nunchakus[$i]->name;
            $this->nunchaku[$i]['owned'] = $nunchakus[$i]->owned;
            $this->nunchaku[$i]['blueprint'] = $nunchakus[$i]->blueprint;
            $this->nunchaku[$i]['r_blueprint'] = $nunchakus[$i]->r_blueprint;
            $this->nunchaku[$i]['handle'] = $nunchakus[$i]->handle;
            $this->nunchaku[$i]['r_handle'] = $nunchakus[$i]->r_handle;
            $this->nunchaku[$i]['chain'] = $nunchakus[$i]->chain;
            $this->nunchaku[$i]['r_chain'] = $nunchakus[$i]->r_chain;
        }

        // Swordshields
        $swordshields = DB::table('user_sword_shields as ub')
                -> join('sword_shields as b', 'ub.sword_shield_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.guard as r_guard', 'b.hilt as r_hilt',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.guard as guard', 'ub.hilt as hilt')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        for ($i = 0; $i < count($swordshields); $i++)
        {
            $this->swordshield[$i]['id'] = $swordshields[$i]->id;
            $this->swordshield[$i]['name'] = $swordshields[$i]->name;
            $this->swordshield[$i]['owned'] = $swordshields[$i]->owned;
            $this->swordshield[$i]['blueprint'] = $swordshields[$i]->blueprint;
            $this->swordshield[$i]['r_blueprint'] = $swordshields[$i]->r_blueprint;
            $this->swordshield[$i]['blade'] = $swordshields[$i]->blade;
            $this->swordshield[$i]['r_blade'] = $swordshields[$i]->r_blade;
            $this->swordshield[$i]['guard'] = $swordshields[$i]->guard;
            $this->swordshield[$i]['r_guard'] = $swordshields[$i]->r_guard;
            $this->swordshield[$i]['hilt'] = $swordshields[$i]->hilt;
            $this->swordshield[$i]['r_hilt'] = $swordshields[$i]->r_hilt;
        }

        return view('livewire.melee-tables', compact(
            'melees',
            'fists',
            'staffs',
            'hammers',
            'glaives',
            'sparrings',
            'nikanas',
            'nunchakus',
            'swordshields'
        ));
    }

    public function update_user_melee(){
        for ($i = 0; $i < count($this->melee); $i++)
        {
            $melee = UserMelee::where('melee_id', $this->melee[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $melee->owned = $this->melee[$i]['owned'];
            $melee->blueprint = (int)$this->melee[$i]['blueprint'];
            $melee->blade = (int)$this->melee[$i]['blade'];
            $melee->handle = (int)$this->melee[$i]['handle'];
            $melee->save();
        }
    }

    public function update_user_fist(){
        for ($i = 0; $i < count($this->fist); $i++)
        {
            $fist = UserFist::where('fist_id', $this->fist[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $fist->owned = $this->fist[$i]['owned'];
            $fist->blueprint = (int)$this->fist[$i]['blueprint'];
            $fist->blade = (int)$this->fist[$i]['blade'];
            $fist->gauntlet = (int)$this->fist[$i]['gauntlet'];
            $fist->save();
        }
    }

    public function update_user_staff(){
        for ($i = 0; $i < count($this->staff); $i++)
        {
            $staff = UserStaff::where('staff_id', $this->staff[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $staff->owned = $this->staff[$i]['owned'];
            $staff->blueprint = (int)$this->staff[$i]['blueprint'];
            $staff->ornament = (int)$this->staff[$i]['ornament'];
            $staff->handle = (int)$this->staff[$i]['handle'];
            $staff->save();
        }
    }

    public function update_user_hammer(){
        for ($i = 0; $i < count($this->hammer); $i++)
        {
            $hammer = UserHammer::where('hammer_id', $this->hammer[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $hammer->owned = $this->hammer[$i]['owned'];
            $hammer->blueprint = (int)$this->hammer[$i]['blueprint'];
            $hammer->head = (int)$this->hammer[$i]['head'];
            $hammer->handle = (int)$this->hammer[$i]['handle'];
            $hammer->save();
        }
    }

    public function update_user_glaive(){
        for ($i = 0; $i < count($this->glaive); $i++)
        {
            $glaive = UserGlaive::where('glaive_id', $this->glaive[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $glaive->owned = $this->glaive[$i]['owned'];
            $glaive->blueprint = (int)$this->glaive[$i]['blueprint'];
            $glaive->blade = (int)$this->glaive[$i]['blade'];
            $glaive->disc = (int)$this->glaive[$i]['disc'];
            $glaive->save();
        }
    }

    public function update_user_sparring(){
        for ($i = 0; $i < count($this->sparring); $i++)
        {
            $sparring = UserSparring::where('sparring_id', $this->sparring[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $sparring->owned = $this->sparring[$i]['owned'];
            $sparring->blueprint = (int)$this->sparring[$i]['blueprint'];
            $sparring->gauntlet = (int)$this->sparring[$i]['gauntlet'];
            $sparring->boot = (int)$this->sparring[$i]['boot'];
            $sparring->save();
        }
    }

    public function update_user_nikana(){
        for ($i = 0; $i < count($this->nikana); $i++)
        {
            $nikana = UserNikana::where('nikana_id', $this->nikana[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $nikana->owned = $this->nikana[$i]['owned'];
            $nikana->blueprint = (int)$this->nikana[$i]['blueprint'];
            $nikana->blade = (int)$this->nikana[$i]['blade'];
            $nikana->hilt = (int)$this->nikana[$i]['hilt'];
            $nikana->save();
        }
    }

    public function update_user_nunchaku(){
        for ($i = 0; $i < count($this->nunchaku); $i++)
        {
            $nunchaku = UserNunchaku::where('nunchaku_id', $this->nunchaku[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $nunchaku->owned = $this->nunchaku[$i]['owned'];
            $nunchaku->blueprint = (int)$this->nunchaku[$i]['blueprint'];
            $nunchaku->handle = (int)$this->nunchaku[$i]['handle'];
            $nunchaku->chain = (int)$this->nunchaku[$i]['chain'];
            $nunchaku->save();
        }
    }

    public function update_user_sword_shield(){
        for ($i = 0; $i < count($this->swordshield); $i++)
        {
            $sword_shield = UserSwordShield::where('sword_shield_id', $this->swordshield[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $sword_shield->owned = $this->swordshield[$i]['owned'];
            $sword_shield->blueprint = (int)$this->swordshield[$i]['blueprint'];
            $sword_shield->blade = (int)$this->swordshield[$i]['blade'];
            $sword_shield->guard = (int)$this->swordshield[$i]['guard'];
            $sword_shield->hilt = (int)$this->swordshield[$i]['hilt'];
            $sword_shield->save();
        }
    }
}
