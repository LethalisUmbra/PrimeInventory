<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserDualPistol;
use Auth;

class DualPistolTable extends Component
{
    public $id_dual_pistol = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $barrel = [];
    public $r_barrel = [];
    public $receiver = [];
    public $r_receiver = [];
    public $link = [];
    public $r_link = [];

    public function render()
    {
        $dual_pistol = DB::table('user_dual_pistols as ub')
                -> join('dual_pistols as b', 'ub.dual_pistol_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.barrel as r_barrel', 'b.receiver as r_receiver', 'b.link as r_link',
                        'ub.blueprint as blueprint', 'ub.barrel as barrel', 'ub.receiver as receiver', 'ub.link as link')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($dual_pistol); $i++)
        {
            $this->id_dual_pistol[$i] = $dual_pistol[$i]->id;
            $this->name[$i] = $dual_pistol[$i]->name;
            $this->owned[$i] = $dual_pistol[$i]->owned;
            $this->blueprint[$i] = $dual_pistol[$i]->blueprint;
            $this->r_blueprint[$i] = $dual_pistol[$i]->r_blueprint;
            $this->barrel[$i] = $dual_pistol[$i]->barrel;
            $this->r_barrel[$i] = $dual_pistol[$i]->r_barrel;
            $this->receiver[$i] = $dual_pistol[$i]->receiver;
            $this->r_receiver[$i] = $dual_pistol[$i]->r_receiver;
            $this->link[$i] = $dual_pistol[$i]->link;
            $this->r_link[$i] = $dual_pistol[$i]->r_link;
        }

        return view('livewire.dual_pistol-table')->with([
            'dual_pistols' => $dual_pistol
        ]);
    }

    public function update_user_dual_pistol(){
        for ($i = 0; $i < count($this->id_dual_pistol); $i++)
        {
            $dual_pistol = UserDualPistol::where('dual_pistol_id', $this->id_dual_pistol[$i])->where('user_id', Auth::user()->id)->first();
            $dual_pistol->owned = $this->owned[$i];
            $dual_pistol->blueprint = (int)$this->blueprint[$i];
            $dual_pistol->barrel = (int)$this->barrel[$i];
            $dual_pistol->receiver = (int)$this->receiver[$i];
            $dual_pistol->link = (int)$this->link[$i];
            $dual_pistol->save();
        }
    }
}
