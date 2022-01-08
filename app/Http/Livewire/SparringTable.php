<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSparring;
use Auth;

class SparringTable extends Component
{
    public $id_sparring = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $gauntlet = [];
    public $r_gauntlet = [];
    public $boot = [];
    public $r_boot = [];

    public function render()
    {
        $sparring = DB::table('user_sparrings as ub')
                -> join('sparrings as b', 'ub.sparring_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.gauntlet as r_gauntlet', 'b.boot as r_boot',
                        'ub.blueprint as blueprint', 'ub.gauntlet as gauntlet', 'ub.boot as boot')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($sparring); $i++)
        {
            $this->id_sparring[$i] = $sparring[$i]->id;
            $this->name[$i] = $sparring[$i]->name;
            $this->owned[$i] = $sparring[$i]->owned;
            $this->blueprint[$i] = $sparring[$i]->blueprint;
            $this->r_blueprint[$i] = $sparring[$i]->r_blueprint;
            $this->gauntlet[$i] = $sparring[$i]->gauntlet;
            $this->r_gauntlet[$i] = $sparring[$i]->r_gauntlet;
            $this->boot[$i] = $sparring[$i]->boot;
            $this->r_boot[$i] = $sparring[$i]->r_boot;
        }

        return view('livewire.sparring-table')->with([
            'sparrings' => $sparring
        ]);
    }

    public function update_user_sparring(){
        for ($i = 0; $i < count($this->id_sparring); $i++)
        {
            $sparring = UserSparring::where('sparring_id', $this->id_sparring[$i])->where('user_id', Auth::user()->id)->first();
            $sparring->owned = $this->owned[$i];
            $sparring->blueprint = (int)$this->blueprint[$i];
            $sparring->gauntlet = (int)$this->gauntlet[$i];
            $sparring->boot = (int)$this->boot[$i];
            $sparring->save();
        }
    }
}
