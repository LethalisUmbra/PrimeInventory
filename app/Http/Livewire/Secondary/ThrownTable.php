<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserThrown;
use Auth;

class ThrownTable extends Component
{
    public $thrown;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->thrown = DB::table('user_throwns as ut')
                -> join('throwns as t', 'ut.thrown_id','=','t.id')
                -> join('users as u', 'ut.user_id','=','u.id')
                ->select('t.id as id', 't.name as name', 'ut.owned as owned',
                        't.blueprint as r_blueprint', 't.pouch as r_pouch', 't.blade as r_blade',
                        'ut.blueprint as blueprint', 'ut.pouch as pouch', 'ut.blade as blade')
                ->where([['ut.user_id','=',Auth::user()->id], ['t.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.thrown-table', [
            'throwns' => $this->thrown,
            'filter' => $this->filter
        ]);
    }

    public function update_user_thrown(){
        foreach($this->thrown as $thrown) {
            $_thrown = UserThrown::firstWhere([
                ['thrown_id', $thrown['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_thrown->owned = $thrown['owned'];
            $_thrown->blueprint = (int)$thrown['blueprint'];
            $_thrown->pouch = (int)$thrown['pouch'];
            $_thrown->blade = (int)$thrown['blade'];
            $_thrown->save();
        }
    }
}
