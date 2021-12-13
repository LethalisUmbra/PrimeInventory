<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserCollar;
use Auth;

class CollarTable extends Component
{
    public $id_collar = [];
    public $name = [];
    public $pet_name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $band = [];
    public $r_band = [];
    public $buckle = [];
    public $r_buckle = [];

    public function render()
    {
        $collar = DB::table('user_collars as ur')
                -> join('collars as col', 'ur.collar_id','=','col.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('col.id as id', 'col.name as name', 'ur.owned as owned', 'col.pet_name as pet_name',
                        'col.blueprint as r_blueprint', 'col.band as r_band', 'col.buckle as r_buckle',
                        'ur.blueprint as blueprint', 'ur.band as band', 'ur.buckle as buckle')
                ->where('ur.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($collar); $i++)
        {
            $this->id_collar[$i] = $collar[$i]->id;
            $this->name[$i] = $collar[$i]->name;
            $this->pet_name[$i] = $collar[$i]->pet_name;
            $this->owned[$i] = $collar[$i]->owned;
            $this->blueprint[$i] = $collar[$i]->blueprint;
            $this->r_blueprint[$i] = $collar[$i]->r_blueprint;
            $this->band[$i] = $collar[$i]->band;
            $this->r_band[$i] = $collar[$i]->r_band;
            $this->buckle[$i] = $collar[$i]->buckle;
            $this->r_buckle[$i] = $collar[$i]->r_buckle;
        }

        return view('livewire.collar-table')->with([
            'collars' => $collar
        ]);
    }

    public function update_user_collar(){
        for ($i = 0; $i < count($this->id_collar); $i++)
        {
            $collar = UserCollar::where('collar_id', $this->id_collar[$i])->where('user_id', Auth::user()->id)->first();
            $collar->owned = $this->owned[$i];
            $collar->blueprint = (int)$this->blueprint[$i];
            $collar->band = (int)$this->band[$i];
            $collar->buckle = (int)$this->buckle[$i];
            $collar->save();
        }
    }
}