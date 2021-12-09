<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserBow;
use Auth;

class BowTable extends Component
{
    public $id_bow = [];
    public $name = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $upper_limb = [];
    public $r_upper_limb = [];
    public $lower_limb = [];
    public $r_lower_limb = [];
    public $grip = [];
    public $r_grip = [];
    public $string = [];
    public $r_string = [];

    public function render()
    {
        $bow = DB::table('user_bows as ub')
                -> join('bows as b', 'ub.bow_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name',
                        'b.blueprint as r_blueprint', 'b.upper_limb as r_upper_limb', 'b.lower_limb as r_lower_limb', 'b.grip as r_grip', 'b.string as r_string',
                        'ub.blueprint as blueprint', 'ub.upper_limb as upper_limb', 'ub.lower_limb as lower_limb', 'ub.grip as grip', 'ub.string as string')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($bow); $i++)
        {
            $this->id_bow[$i] = $bow[$i]->id;
            $this->name[$i] = $bow[$i]->name;
            $this->blueprint[$i] = $bow[$i]->blueprint;
            $this->r_blueprint[$i] = $bow[$i]->r_blueprint;
            $this->upper_limb[$i] = $bow[$i]->upper_limb;
            $this->r_upper_limb[$i] = $bow[$i]->r_upper_limb;
            $this->lower_limb[$i] = $bow[$i]->lower_limb;
            $this->r_lower_limb[$i] = $bow[$i]->r_lower_limb;
            $this->grip[$i] = $bow[$i]->grip;
            $this->r_grip[$i] = $bow[$i]->r_grip;
            $this->string[$i] = $bow[$i]->string;
            $this->r_string[$i] = $bow[$i]->r_string;
        }

        return view('livewire.bow-table')->with([
            'bows' => $bow
        ]);
    }

    public function update_user_bow(){
        for ($i = 0; $i < count($this->id_bow); $i++)
        {
            $bow = UserBow::where('bow_id', $this->id_bow[$i])->where('user_id', Auth::user()->id)->first();
            $bow->blueprint = $this->blueprint[$i];
            $bow->upper_limb = $this->upper_limb[$i];
            $bow->lower_limb = $this->lower_limb[$i];
            $bow->grip = $this->grip[$i];
            $bow->string = $this->string[$i];
            $bow->save();
        }
    }
}
