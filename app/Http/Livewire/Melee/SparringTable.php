<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSparring;
use Auth;

class SparringTable extends Component
{
    public $sparring;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->sparring = DB::table('user_sparrings as us')
                ->join('sparrings as s', 'us.sparring_id','=','s.id')
                ->join('users as u', 'us.user_id','=','u.id')
                ->select('s.id as id', 's.name as name', 'us.owned as owned',
                        's.blueprint as r_blueprint', 's.gauntlet as r_gauntlet', 's.boot as r_boot',
                        'us.blueprint as blueprint', 'us.gauntlet as gauntlet', 'us.boot as boot')
                ->where([['us.user_id','=',Auth::user()->id], ['s.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.sparring-table', [
            'sparrings' => $this->sparring,
            'filter' => $this->filter
        ]);
    }

    public function update_user_sparring(){
        foreach($this->sparring as $sparring) {
            $_sparring = UserSparring::firstWhere([
                ['sparring_id', $sparring['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_sparring->owned = $sparring['owned'];
            $_sparring->blueprint = (int)$sparring['blueprint'];
            $_sparring->gauntlet = (int)$sparring['gauntlet'];
            $_sparring->boot = (int)$sparring['boot'];
            $_sparring->save();
        }
    }
}
