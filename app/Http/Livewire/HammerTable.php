<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserHammer;
use Auth;

class HammerTable extends Component
{
    public $id_hammer = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $head = [];
    public $r_head = [];
    public $handle = [];
    public $r_handle = [];

    public function render()
    {
        $hammer = DB::table('user_hammers as ub')
                -> join('hammers as b', 'ub.hammer_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.head as r_head', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.head as head', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($hammer); $i++)
        {
            $this->id_hammer[$i] = $hammer[$i]->id;
            $this->name[$i] = $hammer[$i]->name;
            $this->owned[$i] = $hammer[$i]->owned;
            $this->blueprint[$i] = $hammer[$i]->blueprint;
            $this->r_blueprint[$i] = $hammer[$i]->r_blueprint;
            $this->head[$i] = $hammer[$i]->head;
            $this->r_head[$i] = $hammer[$i]->r_head;
            $this->handle[$i] = $hammer[$i]->handle;
            $this->r_handle[$i] = $hammer[$i]->r_handle;
        }

        return view('livewire.hammer-table')->with([
            'hammers' => $hammer
        ]);
    }

    public function update_user_hammer(){
        for ($i = 0; $i < count($this->id_hammer); $i++)
        {
            $hammer = UserHammer::where('hammer_id', $this->id_hammer[$i])->where('user_id', Auth::user()->id)->first();
            $hammer->owned = $this->owned[$i];
            $hammer->blueprint = (int)$this->blueprint[$i];
            $hammer->head = (int)$this->head[$i];
            $hammer->handle = (int)$this->handle[$i];
            $hammer->save();
        }
    }
}
