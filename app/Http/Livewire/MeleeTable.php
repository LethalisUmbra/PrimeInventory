<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserMelee;
use Auth;

class MeleeTable extends Component
{
    public $keyword = '';
    public $id_melee = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $handle = [];
    public $r_handle = [];

    public function render()
    {
        $melee = DB::table('user_melees as ub')
                -> join('melees as b', 'ub.melee_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->where('b.name', 'like', "%$this->keyword%")->get();

        for ($i = 0; $i < count($melee); $i++)
        {
            $this->id_melee[$i] = $melee[$i]->id;
            $this->name[$i] = $melee[$i]->name;
            $this->owned[$i] = $melee[$i]->owned;
            $this->blueprint[$i] = $melee[$i]->blueprint;
            $this->r_blueprint[$i] = $melee[$i]->r_blueprint;
            $this->blade[$i] = $melee[$i]->blade;
            $this->r_blade[$i] = $melee[$i]->r_blade;
            $this->handle[$i] = $melee[$i]->handle;
            $this->r_handle[$i] = $melee[$i]->r_handle;
        }

        return view('livewire.melee-table')->with([
            'melees' => $melee
        ]);
    }

    public function update_user_melee(){
        for ($i = 0; $i < count($this->id_melee); $i++)
        {
            $melee = UserMelee::where('melee_id', $this->id_melee[$i])->where('user_id', Auth::user()->id)->first();
            $melee->owned = $this->owned[$i];
            $melee->blueprint = (int)$this->blueprint[$i];
            $melee->blade = (int)$this->blade[$i];
            $melee->handle = (int)$this->handle[$i];
            $melee->save();
        }
    }
}
