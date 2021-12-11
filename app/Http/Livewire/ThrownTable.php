<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserThrown;
use Auth;

class ThrownTable extends Component
{
    public $id_thrown = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $pouch = [];
    public $r_pouch = [];
    public $blade = [];
    public $r_blade = [];

    public function render()
    {
        $thrown = DB::table('user_throwns as ub')
                -> join('throwns as b', 'ub.thrown_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.pouch as r_pouch', 'b.blade as r_blade',
                        'ub.blueprint as blueprint', 'ub.pouch as pouch', 'ub.blade as blade')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($thrown); $i++)
        {
            $this->id_thrown[$i] = $thrown[$i]->id;
            $this->name[$i] = $thrown[$i]->name;
            $this->owned[$i] = $thrown[$i]->owned;
            $this->blueprint[$i] = $thrown[$i]->blueprint;
            $this->r_blueprint[$i] = $thrown[$i]->r_blueprint;
            $this->pouch[$i] = $thrown[$i]->pouch;
            $this->r_pouch[$i] = $thrown[$i]->r_pouch;
            $this->blade[$i] = $thrown[$i]->blade;
            $this->r_blade[$i] = $thrown[$i]->r_blade;
        }

        return view('livewire.thrown-table')->with([
            'throwns' => $thrown
        ]);
    }

    public function update_user_thrown(){
        for ($i = 0; $i < count($this->id_thrown); $i++)
        {
            $thrown = UserThrown::where('thrown_id', $this->id_thrown[$i])->where('user_id', Auth::user()->id)->first();
            $thrown->owned = $this->owned[$i];
            $thrown->blueprint = (int)$this->blueprint[$i];
            $thrown->pouch = (int)$this->pouch[$i];
            $thrown->blade = (int)$this->blade[$i];
            $thrown->save();
        }
    }
}
