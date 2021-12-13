<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserArchwing;
use Auth;

class ArchwingTable extends Component
{
    public $id_archwing = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $harness = [];
    public $r_harness = [];
    public $wings = [];
    public $r_wings = [];
    public $systems = [];
    public $r_systems = [];


    public function render()
    {
        $archwing = DB::table('user_archwings as ur')
                -> join('archwings as r', 'ur.archwing_id','=','r.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('r.id as id', 'r.name as name', 'ur.owned as owned',
                        'r.blueprint as r_blueprint', 'r.harness as r_harness', 'r.wings as r_wings', 'r.systems as r_systems',
                        'ur.blueprint as blueprint', 'ur.harness as harness', 'ur.wings as wings', 'ur.systems as systems')
                ->where('ur.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($archwing); $i++)
        {
            $this->id_archwing[$i] = $archwing[$i]->id;
            $this->name[$i] = $archwing[$i]->name;
            $this->owned[$i] = $archwing[$i]->owned;
            $this->blueprint[$i] = $archwing[$i]->blueprint;
            $this->r_blueprint[$i] = $archwing[$i]->r_blueprint;
            $this->harness[$i] = $archwing[$i]->harness;
            $this->r_harness[$i] = $archwing[$i]->r_harness;
            $this->wings[$i] = $archwing[$i]->wings;
            $this->r_wings[$i] = $archwing[$i]->r_wings;
            $this->systems[$i] = $archwing[$i]->systems;
            $this->r_systems[$i] = $archwing[$i]->r_systems;
        }

        return view('livewire.archwing-table')->with([
            'archwings' => $archwing
        ]);
    }

    public function update_user_archwing(){
        for ($i = 0; $i < count($this->id_archwing); $i++)
        {
            $archwing = UserArchwing::where('archwing_id', $this->id_archwing[$i])->where('user_id', Auth::user()->id)->first();
            $archwing->owned = $this->owned[$i];
            $archwing->blueprint = (int)$this->blueprint[$i];
            $archwing->harness = (int)$this->harness[$i];
            $archwing->wings = (int)$this->wings[$i];
            $archwing->systems = (int)$this->systems[$i];
            $archwing->save();
        }
    }
}