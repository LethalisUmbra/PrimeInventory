<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserAkWeapon;
use Auth;

class AkWeaponTable extends Component
{
    public $id_ak_weapon = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $single_weapon = [];
    public $r_single_weapon = [];
    public $link = [];
    public $r_link = [];

    public function render()
    {
        $ak_weapon = DB::table('user_ak_weapons as uaw')
                -> join('ak_weapons as aw', 'uaw.ak_weapon_id','=','aw.id')
                -> join('users as u', 'uaw.user_id','=','u.id')
                ->select('aw.id as id', 'aw.name as name', 'uaw.owned as owned',
                        'aw.blueprint as r_blueprint', 'aw.single_weapon as r_single_weapon', 'aw.link as r_link',
                        'uaw.blueprint as blueprint', 'uaw.single_weapon as single_weapon', 'uaw.link as link',)
                ->where('uaw.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($ak_weapon); $i++)
        {
            $this->id_ak_weapon[$i] = $ak_weapon[$i]->id;
            $this->name[$i] = $ak_weapon[$i]->name;
            $this->owned[$i] = $ak_weapon[$i]->owned;
            $this->blueprint[$i] = $ak_weapon[$i]->blueprint;
            $this->r_blueprint[$i] = $ak_weapon[$i]->r_blueprint;
            $this->single_weapon[$i] = $ak_weapon[$i]->single_weapon;
            $this->r_single_weapon[$i] = $ak_weapon[$i]->r_single_weapon;
            $this->link[$i] = $ak_weapon[$i]->link;
            $this->r_link[$i] = $ak_weapon[$i]->r_link;
        }

        return view('livewire.ak_weapon-table')->with([
            'ak_weapons' => $ak_weapon
        ]);
    }

    public function update_user_ak_weapon(){
        for ($i = 0; $i < count($this->id_ak_weapon); $i++)
        {
            $ak_weapon = UserAkWeapon::where('ak_weapon_id', $this->id_ak_weapon[$i])->where('user_id', Auth::user()->id)->first();
            $ak_weapon->owned = $this->owned[$i];
            $ak_weapon->blueprint = (int)$this->blueprint[$i];
            $ak_weapon->single_weapon = (int)$this->single_weapon[$i];
            $ak_weapon->link = (int)$this->link[$i];
            $ak_weapon->save();
        }
    }
}
