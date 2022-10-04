<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserDualPistol;
use Auth;

class DualPistolTable extends Component
{
    public $dual_pistol;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->dual_pistol = DB::table('user_dual_pistols as udp')
                -> join('dual_pistols as dp', 'udp.dual_pistol_id','=','dp.id')
                -> join('users as u', 'udp.user_id','=','u.id')
                ->select('dp.id as id', 'dp.name as name', 'udp.owned as owned',
                        'dp.blueprint as r_blueprint', 'dp.barrel as r_barrel', 'dp.receiver as r_receiver', 'dp.link as r_link',
                        'udp.blueprint as blueprint', 'udp.barrel as barrel', 'udp.receiver as receiver', 'udp.link as link')
                ->where([['user_id','=',Auth::user()->id], ['dp.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.dual_pistol-table', [
            'dual_pistols' => $this->dual_pistol,
            'filter' => $this->filter
        ]);
    }

    public function update_user_dual_pistol() {
        foreach($this->dual_pistol as $dual_pistol) {
            $_dual_pistol = UserDualPistol::firstWhere([
                ['dual_pistol_id', $dual_pistol['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_dual_pistol->owned = $dual_pistol['owned'];
            $_dual_pistol->blueprint = (int)$dual_pistol['blueprint'];
            $_dual_pistol->barrel = (int)$dual_pistol['barrel'];
            $_dual_pistol->receiver = (int)$dual_pistol['receiver'];
            $_dual_pistol->link = (int)$dual_pistol['link'];
            $_dual_pistol->save();
        }
    }
}
