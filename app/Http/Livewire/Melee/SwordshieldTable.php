<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSwordShield;
use Auth;

class SwordshieldTable extends Component
{
    public $swordshield;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->swordshield = DB::table('user_sword_shields as uss')
        -> join('sword_shields as ss', 'uss.sword_shield_id','=','ss.id')
        -> join('users as u', 'uss.user_id','=','u.id')
        ->select('ss.id as id', 'ss.name as name', 'uss.owned as owned',
                'ss.blueprint as r_blueprint', 'ss.blade as r_blade', 'ss.guard as r_guard', 'ss.hilt as r_hilt',
                'uss.blueprint as blueprint', 'uss.blade as blade', 'uss.guard as guard', 'uss.hilt as hilt')
                ->where([['uss.user_id','=',Auth::user()->id], ['ss.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.swordshield-table', [
            'swordshields' => $this->swordshield,
            'filter' => $this->filter
        ]);
    }

    public function update_user_swordshield(){
        foreach($this->swordshield as $swordshield) {
            $_swordshield = UserSwordShield::firstWhere([
                ['sword_shield_id', $swordshield['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_swordshield->owned = $swordshield['owned'];
            $_swordshield->blueprint = (int)$swordshield['blueprint'];
            $_swordshield->blade = (int)$swordshield['blade'];
            $_swordshield->guard = (int)$swordshield['guard'];
            $_swordshield->hilt = (int)$swordshield['hilt'];
            $_swordshield->save();
        }
    }
}
