<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserHammer;
use Auth;

class HammerTable extends Component
{
    public $hammer;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->hammer = DB::table('user_hammers as uh')
                ->join('hammers as h', 'uh.hammer_id','=','h.id')
                ->join('users as u', 'uh.user_id','=','u.id')
                ->select('h.id as id', 'h.name as name', 'uh.owned as owned',
                        'h.blueprint as r_blueprint', 'h.head as r_head', 'h.handle as r_handle',
                        'uh.blueprint as blueprint', 'uh.head as head', 'uh.handle as handle')
                ->where([['uh.user_id','=',Auth::user()->id], ['h.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.hammer-table', [
            'hammers' => $this->hammer,
            'filter' => $this->filter
        ]);
    }

    public function update_user_hammer(){
        foreach($this->hammer as $hammer) {
            $_hammer = UserHammer::firstWhere([
                ['hammer_id', $hammer['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_hammer->owned = $hammer['owned'];
            $_hammer->blueprint = (int)$hammer['blueprint'];
            $_hammer->ornament = (int)$hammer['ornament'];
            $_hammer->handle = (int)$hammer['handle'];
            $_hammer->save();
        }
    }
}
