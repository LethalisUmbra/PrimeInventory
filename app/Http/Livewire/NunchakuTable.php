<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserNunchaku;
use Auth;

class NunchakuTable extends Component
{
    public $id_nunchaku = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $handle = [];
    public $r_handle = [];
    public $chain = [];
    public $r_chain = [];

    public function render()
    {
        $nunchaku = DB::table('user_nunchakus as ub')
                -> join('nunchakus as b', 'ub.nunchaku_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.handle as r_handle', 'b.chain as r_chain',
                        'ub.blueprint as blueprint', 'ub.handle as handle', 'ub.chain as chain')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($nunchaku); $i++)
        {
            $this->id_nunchaku[$i] = $nunchaku[$i]->id;
            $this->name[$i] = $nunchaku[$i]->name;
            $this->owned[$i] = $nunchaku[$i]->owned;
            $this->blueprint[$i] = $nunchaku[$i]->blueprint;
            $this->r_blueprint[$i] = $nunchaku[$i]->r_blueprint;
            $this->handle[$i] = $nunchaku[$i]->handle;
            $this->r_handle[$i] = $nunchaku[$i]->r_handle;
            $this->chain[$i] = $nunchaku[$i]->chain;
            $this->r_chain[$i] = $nunchaku[$i]->r_chain;
        }

        return view('livewire.nunchaku-table')->with([
            'nunchakus' => $nunchaku
        ]);
    }

    public function update_user_nunchaku(){
        for ($i = 0; $i < count($this->id_nunchaku); $i++)
        {
            $nunchaku = UserNunchaku::where('nunchaku_id', $this->id_nunchaku[$i])->where('user_id', Auth::user()->id)->first();
            $nunchaku->owned = $this->owned[$i];
            $nunchaku->blueprint = (int)$this->blueprint[$i];
            $nunchaku->handle = (int)$this->handle[$i];
            $nunchaku->chain = (int)$this->chain[$i];
            $nunchaku->save();
        }
    }
}
