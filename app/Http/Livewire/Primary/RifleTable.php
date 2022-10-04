<?php
namespace App\Http\Livewire\Primary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserRifle;
use Auth;

class RifleTable extends Component
{
    public $rifle;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->rifle = DB::table('user_rifles as ur')
            -> join('rifles as r', 'ur.rifle_id','=','r.id')
            -> join('users as u', 'ur.user_id','=','u.id')
            ->select('r.id as id', 'r.name as name', 'ur.owned as owned',
                    'r.blueprint as r_blueprint', 'r.barrel as r_barrel', 'r.receiver as r_receiver', 'r.stock as r_stock',
                    'ur.blueprint as blueprint', 'ur.barrel as barrel', 'ur.receiver as receiver', 'ur.stock as stock')
            ->where([['user_id','=',Auth::user()->id], ['r.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.primary.rifle-table', [
            'rifles' => $this->rifle,
            'filter' => $this->filter
        ]);
    }

    public function update_user_rifle(){
        foreach($this->rifle as $rifle) {
            $_rifle = UserRifle::firstWhere([
                ['rifle_id', $rifle['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_rifle->owned = $rifle['owned'];
            $_rifle->blueprint = (int)$rifle['blueprint'];
            $_rifle->barrel = (int)$rifle['barrel'];
            $_rifle->receiver = (int)$rifle['receiver'];
            $_rifle->stock = (int)$rifle['stock'];
            $_rifle->save();
        }
    }
}