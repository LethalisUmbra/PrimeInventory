<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSwordShield;
use Auth;

class SwordShieldTable extends Component
{
    public $id_sword_shield = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $guard = [];
    public $r_guard = [];
    public $hilt = [];
    public $r_hilt = [];

    public function render()
    {
        $sword_shield = DB::table('user_sword_shields as ub')
                -> join('sword_shields as b', 'ub.sword_shield_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.guard as r_guard', 'b.hilt as r_hilt',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.guard as guard', 'ub.hilt as hilt')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($sword_shield); $i++)
        {
            $this->id_sword_shield[$i] = $sword_shield[$i]->id;
            $this->name[$i] = $sword_shield[$i]->name;
            $this->owned[$i] = $sword_shield[$i]->owned;
            $this->blueprint[$i] = $sword_shield[$i]->blueprint;
            $this->r_blueprint[$i] = $sword_shield[$i]->r_blueprint;
            $this->blade[$i] = $sword_shield[$i]->blade;
            $this->r_blade[$i] = $sword_shield[$i]->r_blade;
            $this->guard[$i] = $sword_shield[$i]->guard;
            $this->r_guard[$i] = $sword_shield[$i]->r_guard;
            $this->hilt[$i] = $sword_shield[$i]->hilt;
            $this->r_hilt[$i] = $sword_shield[$i]->r_hilt;
        }

        return view('livewire.sword_shield-table')->with([
            'sword_shields' => $sword_shield
        ]);
    }

    public function update_user_sword_shield(){
        for ($i = 0; $i < count($this->id_sword_shield); $i++)
        {
            $sword_shield = UserSwordShield::where('sword_shield_id', $this->id_sword_shield[$i])->where('user_id', Auth::user()->id)->first();
            $sword_shield->owned = $this->owned[$i];
            $sword_shield->blueprint = (int)$this->blueprint[$i];
            $sword_shield->blade = (int)$this->blade[$i];
            $sword_shield->guard = (int)$this->guard[$i];
            $sword_shield->hilt = (int)$this->hilt[$i];
            $sword_shield->save();
        }
    }
}
