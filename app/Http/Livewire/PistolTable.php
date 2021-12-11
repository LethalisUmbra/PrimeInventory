<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserPistol;
use Auth;

class PistolTable extends Component
{
    public $id_pistol = [];
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
        $pistol = DB::table('user_pistols as ub')
                -> join('pistols as b', 'ub.pistol_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.barrel as r_barrel', 'b.receiver as r_receiver',
                        'ub.blueprint as blueprint', 'ub.barrel as barrel', 'ub.receiver as receiver')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($pistol); $i++)
        {
            $this->id_pistol[$i] = $pistol[$i]->id;
            $this->name[$i] = $pistol[$i]->name;
            $this->owned[$i] = $pistol[$i]->owned;
            $this->blueprint[$i] = $pistol[$i]->blueprint;
            $this->r_blueprint[$i] = $pistol[$i]->r_blueprint;
            $this->barrel[$i] = $pistol[$i]->barrel;
            $this->r_barrel[$i] = $pistol[$i]->r_barrel;
            $this->receiver[$i] = $pistol[$i]->receiver;
            $this->r_receiver[$i] = $pistol[$i]->r_receiver;
        }

        return view('livewire.pistol-table')->with([
            'pistols' => $pistol
        ]);
    }

    public function update_user_pistol(){
        for ($i = 0; $i < count($this->id_pistol); $i++)
        {
            $pistol = UserPistol::where('pistol_id', $this->id_pistol[$i])->where('user_id', Auth::user()->id)->first();
            $pistol->owned = $this->owned[$i];
            $pistol->blueprint = (int)$this->blueprint[$i];
            $pistol->barrel = (int)$this->barrel[$i];
            $pistol->receiver = (int)$this->receiver[$i];
            $pistol->save();
        }
    }
}
