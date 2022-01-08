<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserNikana;
use Auth;

class NikanaTable extends Component
{
    public $id_nikana = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $hilt = [];
    public $r_hilt = [];

    public function render()
    {
        $nikana = DB::table('user_nikanas as ub')
                -> join('nikanas as b', 'ub.nikana_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.hilt as r_hilt',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.hilt as hilt')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($nikana); $i++)
        {
            $this->id_nikana[$i] = $nikana[$i]->id;
            $this->name[$i] = $nikana[$i]->name;
            $this->owned[$i] = $nikana[$i]->owned;
            $this->blueprint[$i] = $nikana[$i]->blueprint;
            $this->r_blueprint[$i] = $nikana[$i]->r_blueprint;
            $this->blade[$i] = $nikana[$i]->blade;
            $this->r_blade[$i] = $nikana[$i]->r_blade;
            $this->hilt[$i] = $nikana[$i]->hilt;
            $this->r_hilt[$i] = $nikana[$i]->r_hilt;
        }

        return view('livewire.nikana-table')->with([
            'nikanas' => $nikana
        ]);
    }

    public function update_user_nikana(){
        for ($i = 0; $i < count($this->id_nikana); $i++)
        {
            $nikana = UserNikana::where('nikana_id', $this->id_nikana[$i])->where('user_id', Auth::user()->id)->first();
            $nikana->owned = $this->owned[$i];
            $nikana->blueprint = (int)$this->blueprint[$i];
            $nikana->blade = (int)$this->blade[$i];
            $nikana->hilt = (int)$this->hilt[$i];
            $nikana->save();
        }
    }
}
