<?php
namespace App\Http\Livewire\Primary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserShotgun;
use Auth;

class ShotgunTable extends Component
{
    public $shotgun;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->shotgun = DB::table('user_shotguns as us')
            -> join('shotguns as s', 'us.shotgun_id','=','s.id')
            -> join('users as u', 'us.user_id','=','u.id')
            ->select('s.id as id', 's.name as name', 'us.owned as owned',
                's.blueprint as r_blueprint', 's.barrel as r_barrel', 's.receiver as r_receiver', 's.stock as r_stock',
                'us.blueprint as blueprint', 'us.barrel as barrel', 'us.receiver as receiver', 'us.stock as stock')
            ->where([['user_id','=',Auth::user()->id], ['s.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.primary.shotgun-table', [
            'shotguns' => $this->shotgun,
            'filter' => $this->filter
        ]);
    }

    public function update_user_shotgun(){
        foreach($this->shotgun as $shotgun) {
            $_shotgun = UserShotgun::firstWhere([
                ['shotgun_id', $shotgun['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_shotgun->owned = $shotgun['owned'];
            $_shotgun->blueprint = (int)$shotgun['blueprint'];
            $_shotgun->barrel = (int)$shotgun['barrel'];
            $_shotgun->receiver = (int)$shotgun['receiver'];
            $_shotgun->stock = (int)$shotgun['stock'];
            $_shotgun->save();
        }
    }
}