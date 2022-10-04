<?php
namespace App\Http\Livewire\Secondary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserAkWeapon;
use Auth;

class AkWeaponTable extends Component
{
    public $ak_weapon;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->ak_weapon = DB::table('user_ak_weapons as uaw')
                -> join('ak_weapons as aw', 'uaw.ak_weapon_id','=','aw.id')
                -> join('users as u', 'uaw.user_id','=','u.id')
                ->select('aw.id as id', 'aw.name as name', 'uaw.owned as owned',
                        'aw.blueprint as r_blueprint', 'aw.single_weapon as r_single_weapon', 'aw.link as r_link',
                        'uaw.blueprint as blueprint', 'uaw.single_weapon as single_weapon', 'uaw.link as link',)
                ->where([['user_id','=',Auth::user()->id], ['aw.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.secondary.ak_weapon-table', [
            'ak_weapons' => $this->ak_weapon,
            'filter' => $this->filter
        ]);
    }

    public function update_user_ak_weapon(){
        foreach($this->ak_weapon as $ak_weapon) {
            $_ak_weapon = UserAkWeapon::firstWhere([
                ['ak_weapon_id', $ak_weapon['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_ak_weapon->owned = $ak_weapon['owned'];
            $_ak_weapon->blueprint = (int)$ak_weapon['blueprint'];
            $_ak_weapon->single_weapon = (int)$ak_weapon['single_weapon'];
            $_ak_weapon->link = (int)$ak_weapon['link'];
            $_ak_weapon->save();
        }
    }
}
