<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserGlaive;
use Auth;

class GlaiveTable extends Component
{
    public $id_glaive = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $disc = [];
    public $r_disc = [];

    public function render()
    {
        $glaive = DB::table('user_glaives as ub')
                -> join('glaives as b', 'ub.glaive_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.disc as r_disc',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.disc as disc')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($glaive); $i++)
        {
            $this->id_glaive[$i] = $glaive[$i]->id;
            $this->name[$i] = $glaive[$i]->name;
            $this->owned[$i] = $glaive[$i]->owned;
            $this->blueprint[$i] = $glaive[$i]->blueprint;
            $this->r_blueprint[$i] = $glaive[$i]->r_blueprint;
            $this->blade[$i] = $glaive[$i]->blade;
            $this->r_blade[$i] = $glaive[$i]->r_blade;
            $this->disc[$i] = $glaive[$i]->disc;
            $this->r_disc[$i] = $glaive[$i]->r_disc;
        }

        return view('livewire.glaive-table')->with([
            'glaives' => $glaive
        ]);
    }

    public function update_user_glaive(){
        for ($i = 0; $i < count($this->id_glaive); $i++)
        {
            $glaive = UserGlaive::where('glaive_id', $this->id_glaive[$i])->where('user_id', Auth::user()->id)->first();
            $glaive->owned = $this->owned[$i];
            $glaive->blueprint = (int)$this->blueprint[$i];
            $glaive->blade = (int)$this->blade[$i];
            $glaive->disc = (int)$this->disc[$i];
            $glaive->save();
        }
    }
}
