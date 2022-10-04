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
        $this->sec_crossbow = DB::table('user_sec_crossbows as usc')
                -> join('sec_crossbows as sc', 'usc.sec_crossbow_id','=','sc.id')
                -> join('users as u', 'usc.user_id','=','u.id')
                ->select('sc.id as id', 'sc.name as name', 'usc.owned as owned',
                        'sc.blueprint as r_blueprint', 'sc.upper_limb as r_upper_limb', 'sc.lower_limb as r_lower_limb', 'sc.receiver as r_receiver', 'sc.string as r_string',
                        'usc.blueprint as blueprint', 'usc.upper_limb as upper_limb', 'usc.lower_limb as lower_limb', 'usc.receiver as receiver', 'usc.string as string')
                ->where([['user_id','=',Auth::user()->id], ['sc.name', 'LIKE', "%$this->filter%"]])
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
