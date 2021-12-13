<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserWarframe;
use Auth;

class WarframeTable extends Component
{
    public $id_warframe = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $neuroptics = [];
    public $r_neuroptics = [];
    public $chassis = [];
    public $r_chassis = [];
    public $systems = [];
    public $r_systems = [];


    public function render()
    {
        $warframe = DB::table('user_warframes as ur')
                -> join('warframes as r', 'ur.warframe_id','=','r.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('r.id as id', 'r.name as name', 'ur.owned as owned',
                        'r.blueprint as r_blueprint', 'r.neuroptics as r_neuroptics', 'r.chassis as r_chassis', 'r.systems as r_systems',
                        'ur.blueprint as blueprint', 'ur.neuroptics as neuroptics', 'ur.chassis as chassis', 'ur.systems as systems')
                ->where('ur.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($warframe); $i++)
        {
            $this->id_warframe[$i] = $warframe[$i]->id;
            $this->name[$i] = $warframe[$i]->name;
            $this->owned[$i] = $warframe[$i]->owned;
            $this->blueprint[$i] = $warframe[$i]->blueprint;
            $this->r_blueprint[$i] = $warframe[$i]->r_blueprint;
            $this->neuroptics[$i] = $warframe[$i]->neuroptics;
            $this->r_neuroptics[$i] = $warframe[$i]->r_neuroptics;
            $this->chassis[$i] = $warframe[$i]->chassis;
            $this->r_chassis[$i] = $warframe[$i]->r_chassis;
            $this->systems[$i] = $warframe[$i]->systems;
            $this->r_systems[$i] = $warframe[$i]->r_systems;
        }

        return view('livewire.warframe-table')->with([
            'warframes' => $warframe
        ]);
    }

    public function update_user_warframe(){
        for ($i = 0; $i < count($this->id_warframe); $i++)
        {
            $warframe = UserWarframe::where('warframe_id', $this->id_warframe[$i])->where('user_id', Auth::user()->id)->first();
            $warframe->owned = $this->owned[$i];
            $warframe->blueprint = (int)$this->blueprint[$i];
            $warframe->neuroptics = (int)$this->neuroptics[$i];
            $warframe->chassis = (int)$this->chassis[$i];
            $warframe->systems = (int)$this->systems[$i];
            $warframe->save();
        }
    }
}