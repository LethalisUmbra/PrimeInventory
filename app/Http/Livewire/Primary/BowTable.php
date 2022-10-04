<?php
namespace App\Http\Livewire\Primary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserBow;
use Auth;

class BowTable extends Component
{
    public $bow;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->bow = DB::table('user_bows as ub')
            ->join('bows as b', 'ub.bow_id','=','b.id')
            -> join('users as u', 'ub.user_id','=','u.id')
            ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                    'b.blueprint as r_blueprint', 'b.upper_limb as r_upper_limb', 'b.lower_limb as r_lower_limb', 'b.grip as r_grip', 'b.string as r_string',
                    'ub.blueprint as blueprint', 'ub.upper_limb as upper_limb', 'ub.lower_limb as lower_limb', 'ub.grip as grip', 'ub.string as string')
            ->where([['user_id','=',Auth::user()->id], ['b.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.primary.bow-table', [
            'bows' => $this->bow,
            'filter' => $this->filter
        ]);
    }

    public function update_user_bow(){
        foreach($this->bow as $bow) {
            $_bow = UserBow::firstWhere([
                ['bow_id', $bow['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_bow->owned = $bow['owned'];
            $_bow->blueprint = (int)$bow['blueprint'];
            $_bow->upper_limb = (int)$bow['upper_limb'];
            $_bow->lower_limb = (int)$bow['lower_limb'];
            $_bow->grip = (int)$bow['grip'];
            $_bow->string = (int)$bow['string'];
            $_bow->save();
        }
    }
}