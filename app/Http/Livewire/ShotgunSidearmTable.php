<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserShotgunSidearm;
use Auth;

class ShotgunSidearmTable extends Component
{
    public $id_shotgun_sidearm = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $barrel = [];
    public $r_barrel = [];
    public $receiver = [];
    public $r_receiver = [];

    public function render()
    {
        $shotgun_sidearm = DB::table('user_shotgun_sidearms as ub')
                -> join('shotgun_sidearms as b', 'ub.shotgun_sidearm_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.barrel as r_barrel', 'b.receiver as r_receiver',
                        'ub.blueprint as blueprint', 'ub.barrel as barrel', 'ub.receiver as receiver')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($shotgun_sidearm); $i++)
        {
            $this->id_shotgun_sidearm[$i] = $shotgun_sidearm[$i]->id;
            $this->name[$i] = $shotgun_sidearm[$i]->name;
            $this->owned[$i] = $shotgun_sidearm[$i]->owned;
            $this->blueprint[$i] = $shotgun_sidearm[$i]->blueprint;
            $this->r_blueprint[$i] = $shotgun_sidearm[$i]->r_blueprint;
            $this->barrel[$i] = $shotgun_sidearm[$i]->barrel;
            $this->r_barrel[$i] = $shotgun_sidearm[$i]->r_barrel;
            $this->receiver[$i] = $shotgun_sidearm[$i]->receiver;
            $this->r_receiver[$i] = $shotgun_sidearm[$i]->r_receiver;
        }

        return view('livewire.shotgun_sidearm-table')->with([
            'shotgun_sidearms' => $shotgun_sidearm
        ]);
    }

    public function update_user_shotgun_sidearm(){
        for ($i = 0; $i < count($this->id_shotgun_sidearm); $i++)
        {
            $shotgun_sidearm = UserShotgunSidearm::where('shotgun_sidearm_id', $this->id_shotgun_sidearm[$i])->where('user_id', Auth::user()->id)->first();
            $shotgun_sidearm->owned = $this->owned[$i];
            $shotgun_sidearm->blueprint = (int)$this->blueprint[$i];
            $shotgun_sidearm->barrel = (int)$this->barrel[$i];
            $shotgun_sidearm->receiver = (int)$this->receiver[$i];
            $shotgun_sidearm->save();
        }
    }
}
