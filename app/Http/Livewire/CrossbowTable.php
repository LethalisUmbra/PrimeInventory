<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
// User[Category]
use App\Models\UserCrossbow;

// [Category]Table
class CrossbowTable extends Component
{
    // Remember change components depending on category
    public $id_crossbow = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $grip = [];
    public $r_grip = [];
    public $string = [];
    public $r_string = [];
    public $barrel = [];
    public $r_barrel = [];
    public $receiver = [];
    public $r_receiver = [];

    public function render()
    {
        $crossbow = DB::table('user_crossbows as uc') // user_[category]s as uc
                -> join('crossbows as c', 'uc.crossbow_id','=','c.id') // [category]s as w
                -> join('users as u', 'uc.user_id','=','u.id')
                ->select('c.id as id', 'c.name as name', 'uc.owned as owned',
                        'c.blueprint as r_blueprint', 'c.grip as r_grip', 'c.string as r_string', 'c.barrel as r_barrel', 'c.receiver as r_receiver',
                        'uc.blueprint as blueprint', 'uc.grip as grip', 'uc.string as string', 'uc.barrel as barrel', 'uc.receiver as receiver')
                ->where('uc.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($crossbow); $i++)
        {
            $this->id_crossbow[$i] = $crossbow[$i]->id;
            $this->name[$i] = $crossbow[$i]->name;
            $this->owned[$i] = $crossbow[$i]->owned;
            $this->blueprint[$i] = $crossbow[$i]->blueprint;
            $this->r_blueprint[$i] = $crossbow[$i]->r_blueprint;
            $this->grip[$i] = $crossbow[$i]->grip;
            $this->r_grip[$i] = $crossbow[$i]->r_grip;
            $this->string[$i] = $crossbow[$i]->string;
            $this->r_string[$i] = $crossbow[$i]->r_string;
            $this->barrel[$i] = $crossbow[$i]->barrel;
            $this->r_barrel[$i] = $crossbow[$i]->r_barrel;
            $this->receiver[$i] = $crossbow[$i]->receiver;
            $this->r_receiver[$i] = $crossbow[$i]->r_receiver;
        }

        // livewire.[category]-table
        return view('livewire.crossbow-table')->with([
            'crossbows' => $crossbow
        ]);
    }

    // update_user_[category]
    public function update_user_crossbow(){
        for ($i = 0; $i < count($this->id_crossbow); $i++)
        {
            // User[Category]
            $crossbow = UserCrossbow::where('crossbow_id', $this->id_crossbow[$i])->where('user_id', Auth::user()->id)->first();
            $crossbow->owned = $this->owned[$i];
            $crossbow->blueprint = (int)$this->blueprint[$i];
            $crossbow->grip = (int)$this->grip[$i];
            $crossbow->string = (int)$this->string[$i];
            $crossbow->barrel = (int)$this->barrel[$i];
            $crossbow->receiver = (int)$this->receiver[$i];
            $crossbow->save();
        }
    }
}
