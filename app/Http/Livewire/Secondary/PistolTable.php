<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserPistol;
use Auth;

class PistolTable extends Component
{
    public $pistol;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->pistol = DB::table('user_pistols as up')
                -> join('pistols as p', 'up.pistol_id','=','p.id')
                -> join('users as u', 'up.user_id','=','u.id')
                ->select('p.id as id', 'p.name as name', 'up.owned as owned',
                        'p.blueprint as r_blueprint', 'p.barrel as r_barrel', 'p.receiver as r_receiver',
                        'up.blueprint as blueprint', 'up.barrel as barrel', 'up.receiver as receiver')
                ->where([['user_id','=',Auth::user()->id], ['p.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.pistol-table', [
            'pistols' => $this->pistol,
            'filter' => $this->filter
        ]);
    }

    public function update_user_pistol() {
        foreach($this->pistol as $pistol) {
            $_pistol = UserPistol::firstWhere([
                ['pistol_id', $pistol['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_pistol->owned = $pistol['owned'];
            $_pistol->blueprint = (int)$pistol['blueprint'];
            $_pistol->barrel = (int)$pistol['barrel'];
            $_pistol->receiver = (int)$pistol['receiver'];
            $_pistol->save();
        }
    }
}
