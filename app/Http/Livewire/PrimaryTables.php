<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\UserBow;
use App\Models\UserCrossbow;
use App\Models\UserRifle;
use App\Models\UserShotgun;
use App\Models\UserSpeargun;

class PrimaryTables extends Component
{
    public $filter;

    public $bow = [];
    public $crossbow = [];
    public $rifle = [];
    public $shotgun = [];
    public $speargun = [];

    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        // Bows
        $this->bow = DB::table('user_bows as ub')
                ->join('bows as b', 'ub.bow_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.upper_limb as r_upper_limb', 'b.lower_limb as r_lower_limb', 'b.grip as r_grip', 'b.string as r_string',
                        'ub.blueprint as blueprint', 'ub.upper_limb as upper_limb', 'ub.lower_limb as lower_limb', 'ub.grip as grip', 'ub.string as string')
                ->where([
                    ['user_id','=',Auth::user()->id],
                    ['b.name', 'LIKE', "%$this->filter%"]
                ])->get();

        // Crossbows
        $this->crossbow = DB::table('user_crossbows as uc')
                -> join('crossbows as c', 'uc.crossbow_id','=','c.id')
                -> join('users as u', 'uc.user_id','=','u.id')
                ->select('c.id as id', 'c.name as name', 'uc.owned as owned',
                        'c.blueprint as r_blueprint', 'c.grip as r_grip', 'c.string as r_string', 'c.barrel as r_barrel', 'c.receiver as r_receiver',
                        'uc.blueprint as blueprint', 'uc.grip as grip', 'uc.string as string', 'uc.barrel as barrel', 'uc.receiver as receiver')
                ->where('uc.user_id','=',Auth::user()->id)->where('c.name', 'LIKE', "%$this->filter%")->get();

        // Rifle
        $this->rifle = DB::table('user_rifles as ur')
                -> join('rifles as r', 'ur.rifle_id','=','r.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('r.id as id', 'r.name as name', 'ur.owned as owned',
                        'r.blueprint as r_blueprint', 'r.barrel as r_barrel', 'r.receiver as r_receiver', 'r.stock as r_stock',
                        'ur.blueprint as blueprint', 'ur.barrel as barrel', 'ur.receiver as receiver', 'ur.stock as stock')
                ->where('ur.user_id','=',Auth::user()->id)->where('r.name', 'LIKE', "%$this->filter%")->get();

        // Shotgun
        $this->shotgun = DB::table('user_shotguns as us')
                -> join('shotguns as s', 'us.shotgun_id','=','s.id')
                -> join('users as u', 'us.user_id','=','u.id')
                ->select('s.id as id', 's.name as name', 'us.owned as owned',
                    's.blueprint as r_blueprint', 's.barrel as r_barrel', 's.receiver as r_receiver', 's.stock as r_stock',
                    'us.blueprint as blueprint', 'us.barrel as barrel', 'us.receiver as receiver', 'us.stock as stock')
                ->where('us.user_id','=',Auth::user()->id)->where('s.name', 'LIKE', "%$this->filter%")->get();

        // Speargun
        $this->speargun = DB::table('user_spearguns as ub')
                -> join('spearguns as b', 'ub.speargun_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.barrel as r_barrel', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.barrel as barrel', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'LIKE', "%$this->filter%")->get();

        return view('livewire.primary-tables', [
            'bows' => $this->bow,
            'crossbows' => $this->crossbow,
            'rifles' => $this->rifle,
            'shotguns' => $this->shotgun,
            'spearguns' => $this->speargun
        ]);
    }

    public function update_user_bow(){
        for ($i = 0; $i < count($this->bow); $i++)
        {
            $bow = UserBow::where('bow_id', $this->bow[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $bow->owned = $this->bow[$i]['owned'];
            $bow->blueprint = (int)$this->bow[$i]['blueprint'];
            $bow->upper_limb = (int)$this->bow[$i]['upper_limb'];
            $bow->lower_limb = (int)$this->bow[$i]['lower_limb'];
            $bow->grip = (int)$this->bow[$i]['grip'];
            $bow->string = (int)$this->bow[$i]['string'];
            $bow->save();
        }
    }

    public function update_user_crossbow(){
        for ($i = 0; $i < count($this->crossbow); $i++)
        {
            // User[Category]
            $crossbow = UserCrossbow::where('crossbow_id', $this->crossbow[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $crossbow->owned = $this->crossbow[$i]['owned'];
            $crossbow->blueprint = (int)$this->crossbow[$i]['blueprint'];
            $crossbow->grip = (int)$this->crossbow[$i]['grip'];
            $crossbow->string = (int)$this->crossbow[$i]['string'];
            $crossbow->barrel = (int)$this->crossbow[$i]['barrel'];
            $crossbow->receiver = (int)$this->crossbow[$i]['receiver'];
            $crossbow->save();
        }
    }

    public function update_user_rifle(){
        for ($i = 0; $i < count($this->rifle); $i++)
        {
            $user_rifle = UserRifle::where('rifle_id', $this->rifle[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $user_rifle->owned = $this->rifle[$i]['owned'];
            $user_rifle->blueprint = (int)$this->rifle[$i]['blueprint'];
            $user_rifle->barrel = (int)$this->rifle[$i]['barrel'];
            $user_rifle->receiver = (int)$this->rifle[$i]['receiver'];
            $user_rifle->stock = (int)$this->rifle[$i]['stock'];
            $user_rifle->save();
        }
    }

    public function update_user_shotgun(){
        for ($i = 0; $i < count($this->shotgun); $i++)
        {
            $shotgun = UserShotgun::where('shotgun_id', $this->shotgun[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $shotgun->owned = $this->shotgun[$i]['owned'];
            $shotgun->blueprint = (int)$this->shotgun[$i]['blueprint'];
            $shotgun->barrel = (int)$this->shotgun[$i]['barrel'];
            $shotgun->receiver = (int)$this->shotgun[$i]['receiver'];
            $shotgun->stock = (int)$this->shotgun[$i]['stock'];
            $shotgun->save();
        }
    }

    public function update_user_speargun(){
        for ($i = 0; $i < count($this->speargun); $i++)
        {
            $speargun = UserSpeargun::where('speargun_id', $this->speargun[$i]['id'])->where('user_id', Auth::user()->id)->first();
            $speargun->owned = $this->speargun[$i]['owned'];
            $speargun->blueprint = (int)$this->speargun[$i]['blueprint'];
            $speargun->blade = (int)$this->speargun[$i]['blade'];
            $speargun->barrel = (int)$this->speargun[$i]['barrel'];
            $speargun->handle = (int)$this->speargun[$i]['handle'];
            $speargun->save();
        }
    }
}
