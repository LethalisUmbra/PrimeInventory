<?php
namespace App\Http\Livewire\Companion;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSentinel;
use Auth;

class SentinelTable extends Component
{
    public $sentinel = [];
    public $filter;

    protected $listeners = ['refresh'];
    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->sentinel = DB::table('user_sentinels as us')
            ->join('sentinels as sen', 'us.sentinel_id','=','sen.id')
            ->join('users as u', 'us.user_id','=','u.id')
            ->select('sen.id as id', 'sen.name as name', 'us.owned as owned',
                    'sen.blueprint as r_blueprint', 'sen.cerebrum as r_cerebrum', 'sen.carapace as r_carapace', 'sen.systems as r_systems',
                    'us.blueprint as blueprint', 'us.cerebrum as cerebrum', 'us.carapace as carapace', 'us.systems as systems')
            ->where([['user_id','=',Auth::user()->id], ['sen.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.companion.sentinel-table')->with([
            'sentinels' => $this->sentinel,
            'filter' => $this->filter
        ]);
    }

    public function update_user_sentinel(){
        foreach($this->sentinel as $sentinel) {
            $_sentinel = UserSentinel::firstWhere([['sentinel_id', $sentinel['id']], ['user_id', Auth::user()->id]]);
            $_sentinel->owned = $sentinel['owned'];
            $_sentinel->blueprint = (int)$sentinel['blueprint'];
            $_sentinel->cerebrum = (int)$sentinel['cerebrum'];
            $_sentinel->carapace = (int)$sentinel['carapace'];
            $_sentinel->systems = (int)$sentinel['systems'];
            $_sentinel->save();
        }
    }
}