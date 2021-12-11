<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSecCrossbow;
use Auth;

class SecCrossbowTable extends Component
{
    public $id_sec_crossbow = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $upper_limb = [];
    public $r_upper_limb = [];
    public $lower_limb = [];
    public $r_lower_limb = [];
    public $receiver = [];
    public $r_receiver = [];
    public $string = [];
    public $r_string = [];

    public function render()
    {
        $sec_crossbow = DB::table('user_sec_crossbows as ub')
                -> join('sec_crossbows as b', 'ub.sec_crossbow_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.upper_limb as r_upper_limb', 'b.lower_limb as r_lower_limb', 'b.receiver as r_receiver', 'b.string as r_string',
                        'ub.blueprint as blueprint', 'ub.upper_limb as upper_limb', 'ub.lower_limb as lower_limb', 'ub.receiver as receiver', 'ub.string as string')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($sec_crossbow); $i++)
        {
            $this->id_sec_crossbow[$i] = $sec_crossbow[$i]->id;
            $this->name[$i] = $sec_crossbow[$i]->name;
            $this->owned[$i] = $sec_crossbow[$i]->owned;
            $this->blueprint[$i] = $sec_crossbow[$i]->blueprint;
            $this->r_blueprint[$i] = $sec_crossbow[$i]->r_blueprint;
            $this->upper_limb[$i] = $sec_crossbow[$i]->upper_limb;
            $this->r_upper_limb[$i] = $sec_crossbow[$i]->r_upper_limb;
            $this->lower_limb[$i] = $sec_crossbow[$i]->lower_limb;
            $this->r_lower_limb[$i] = $sec_crossbow[$i]->r_lower_limb;
            $this->receiver[$i] = $sec_crossbow[$i]->receiver;
            $this->r_receiver[$i] = $sec_crossbow[$i]->r_receiver;
            $this->string[$i] = $sec_crossbow[$i]->string;
            $this->r_string[$i] = $sec_crossbow[$i]->r_string;
        }

        return view('livewire.sec_crossbow-table')->with([
            'sec_crossbows' => $sec_crossbow
        ]);
    }

    public function update_user_sec_crossbow(){
        for ($i = 0; $i < count($this->id_sec_crossbow); $i++)
        {
            $sec_crossbow = UserSecCrossbow::where('sec_crossbow_id', $this->id_sec_crossbow[$i])->where('user_id', Auth::user()->id)->first();
            $sec_crossbow->owned = $this->owned[$i];
            $sec_crossbow->blueprint = (int)$this->blueprint[$i];
            $sec_crossbow->upper_limb = (int)$this->upper_limb[$i];
            $sec_crossbow->lower_limb = (int)$this->lower_limb[$i];
            $sec_crossbow->receiver = (int)$this->receiver[$i];
            $sec_crossbow->string = (int)$this->string[$i];
            $sec_crossbow->save();
        }
    }
}
