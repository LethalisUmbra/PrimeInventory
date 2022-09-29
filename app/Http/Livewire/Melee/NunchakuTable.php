<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserNunchaku;
use Auth;

class NunchakuTable extends Component
{
    public $nunchaku;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->nunchaku = DB::table('user_nunchakus as un')
        -> join('nunchakus as n', 'un.nunchaku_id','=','n.id')
        -> join('users as u', 'un.user_id','=','u.id')
        ->select('n.id as id', 'n.name as name', 'un.owned as owned',
                'n.blueprint as r_blueprint', 'n.handle as r_handle', 'n.chain as r_chain',
                'un.blueprint as blueprint', 'un.handle as handle', 'un.chain as chain')
                ->where([['un.user_id','=',Auth::user()->id], ['n.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.nunchaku-table', [
            'nunchakus' => $this->nunchaku,
            'filter' => $this->filter
        ]);
    }

    public function update_user_nunchaku(){
        foreach($this->nunchaku as $nunchaku) {
            $_nunchaku = UserNunchaku::firstWhere([
                ['nunchaku_id', $nunchaku['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_nunchaku->owned = $nunchaku['owned'];
            $_nunchaku->blueprint = (int)$nunchaku['blueprint'];
            $_nunchaku->handle = (int)$nunchaku['handle'];
            $_nunchaku->chain = (int)$nunchaku['chain'];
            $_nunchaku->save();
        }
    }
}
