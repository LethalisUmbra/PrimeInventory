<?php
namespace App\Http\Livewire\Primary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserCrossbow;
use Auth;

class CrossbowTable extends Component
{
    public $crossbow;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->crossbow = DB::table('user_crossbows as uc')
            -> join('crossbows as c', 'uc.crossbow_id','=','c.id')
            -> join('users as u', 'uc.user_id','=','u.id')
            ->select('c.id as id', 'c.name as name', 'uc.owned as owned',
                    'c.blueprint as r_blueprint', 'c.grip as r_grip', 'c.string as r_string', 'c.barrel as r_barrel', 'c.receiver as r_receiver',
                    'uc.blueprint as blueprint', 'uc.grip as grip', 'uc.string as string', 'uc.barrel as barrel', 'uc.receiver as receiver')
            ->where([['user_id','=',Auth::user()->id], ['c.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.primary.crossbow-table', [
            'crossbows' => $this->crossbow,
            'filter' => $this->filter
        ]);
    }

    public function update_user_crossbow(){
        foreach($this->crossbow as $crossbow) {
            $_crossbow = UserCrossbow::firstWhere([
                ['crossbow_id', $crossbow['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_crossbow->owned = $crossbow['owned'];
            $_crossbow->blueprint = (int)$crossbow['blueprint'];
            $_crossbow->grip = (int)$crossbow['grip'];
            $_crossbow->string = (int)$crossbow['string'];
            $_crossbow->barrel = (int)$crossbow['barrel'];
            $_crossbow->receiver = (int)$crossbow['receiver'];
            $_crossbow->save();
        }
    }
}