<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserNikana;
use Auth;

class NikanaTable extends Component
{
    public $nikana;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->nikana = DB::table('user_nikanas as un')
                ->join('nikanas as n', 'un.nikana_id','=','n.id')
                ->join('users as u', 'un.user_id','=','u.id')
                ->select('n.id as id', 'n.name as name', 'un.owned as owned',
                        'n.blueprint as r_blueprint', 'n.blade as r_blade', 'n.hilt as r_hilt',
                        'un.blueprint as blueprint', 'un.blade as blade', 'un.hilt as hilt')
                ->where([['un.user_id','=',Auth::user()->id], ['n.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.nikana-table', [
            'nikanas' => $this->nikana,
            'filter' => $this->filter
        ]);
    }

    public function update_user_nikana(){
        foreach($this->nikana as $nikana) {
            $_nikana = UserNikana::firstWhere([
                ['nikana_id', $nikana['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_nikana->owned = $nikana['owned'];
            $_nikana->blueprint = (int)$nikana['blueprint'];
            $_nikana->blade = (int)$nikana['blade'];
            $_nikana->hilt = (int)$nikana['hilt'];
            $_nikana->save();
        }
    }
}
