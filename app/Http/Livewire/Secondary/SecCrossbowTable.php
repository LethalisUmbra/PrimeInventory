<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSecCrossbow;
use Auth;

class SecCrossbowTable extends Component
{
    public $sec_crossbow;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->sec_crossbow = DB::table('user_sec_crossbows as ub')
                -> join('sec_crossbows as b', 'ub.sec_crossbow_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.upper_limb as r_upper_limb', 'b.lower_limb as r_lower_limb', 'b.receiver as r_receiver', 'b.string as r_string',
                        'ub.blueprint as blueprint', 'ub.upper_limb as upper_limb', 'ub.lower_limb as lower_limb', 'ub.receiver as receiver', 'ub.string as string')
                ->where([['ub.user_id','=',Auth::user()->id], ['b.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.sec_crossbow-table', [
            'sec_crossbows' => $this->sec_crossbow,
            'filter' => $this->filter
        ]);
    }

    public function update_user_sec_crossbow() {
        foreach($this->sec_crossbow as $sec_crossbow) {
            $_sec_crossbow = UserSecCrossbow::firstWhere([
                ['sec_crossbow_id', $sec_crossbow['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_sec_crossbow->owned = $sec_crossbow['owned'];
            $_sec_crossbow->blueprint = (int)$sec_crossbow['blueprint'];
            $_sec_crossbow->upper_limb = (int)$sec_crossbow['upper_limb'];
            $_sec_crossbow->lower_limb = (int)$sec_crossbow['lower_limb'];
            $_sec_crossbow->receiver = (int)$sec_crossbow['receiver'];
            $_sec_crossbow->string = (int)$sec_crossbow['string'];
            $_sec_crossbow->save();
        }
    }
}
