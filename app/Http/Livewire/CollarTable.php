<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserCollar;
use Auth;

class CollarTable extends Component
{
    public $collar;
    public $filter;

    protected $listeners = ['refresh'];
    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->collar = DB::table('user_collars as uc')
                -> join('collars as col', 'uc.collar_id','=','col.id')
                -> join('users as u', 'uc.user_id','=','u.id')
                ->select('col.id as id', 'col.name as name', 'uc.owned as owned', 'col.pet_name as pet_name',
                        'col.blueprint as r_blueprint', 'col.band as r_band', 'col.buckle as r_buckle',
                        'uc.blueprint as blueprint', 'uc.band as band', 'uc.buckle as buckle')
                ->where([['uc.user_id','=',Auth::user()->id], ['col.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.collar-table')->with([
            'collars' => $this->collar,
            'filter' => $this->filter
        ]);
    }

    public function update_user_collar(){
        foreach($this->collar as $collar) {
            $_collar = UserCollar::firstWhere([['collar_id', $collar['id']], ['user_id', Auth::user()->id]]);
            $_collar->owned = $collar['owned'];
            $_collar->blueprint = (int)$collar['blueprint'];
            $_collar->band = (int)$collar['band'];
            $_collar->buckle = (int)$collar['buckle'];
            $_collar->save();
        }
    }
}