<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserShotgunSidearm;
use Auth;

class ShotgunSidearmTable extends Component
{
    public $shotgun_sidearm;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->shotgun_sidearm = DB::table('user_shotgun_sidearms as uss')
                -> join('shotgun_sidearms as ss', 'uss.shotgun_sidearm_id','=','ss.id')
                -> join('users as u', 'uss.user_id','=','u.id')
                ->select('ss.id as id', 'ss.name as name', 'uss.owned as owned',
                        'ss.blueprint as r_blueprint', 'ss.barrel as r_barrel', 'ss.receiver as r_receiver',
                        'uss.blueprint as blueprint', 'uss.barrel as barrel', 'uss.receiver as receiver')
                ->where([['user_id','=',Auth::user()->id], ['ss.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.shotgun_sidearm-table', [
            'shotgun_sidearms' => $this->shotgun_sidearm,
            'filter' => $this->filter
        ]);
    }

    public function update_user_shotgun_sidearm(){
        foreach($this->shotgun_sidearm as $shotgun_sidearm) {
            $_shotgun_sidearm = UserShotgunSidearm::firstWhere([
                ['shotgun_sidearm_id', $shotgun_sidearm['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_shotgun_sidearm->owned = $shotgun_sidearm['owned'];
            $_shotgun_sidearm->blueprint = (int)$shotgun_sidearm['blueprint'];
            $_shotgun_sidearm->barrel = (int)$shotgun_sidearm['barrel'];
            $_shotgun_sidearm->receiver = (int)$shotgun_sidearm['receiver'];
            $_shotgun_sidearm->save();
        }
    }
}
