<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserFist;
use Auth;

class FistTable extends Component
{
    public $id_fist = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $gauntlet = [];
    public $r_gauntlet = [];

    public function render()
    {
        $fist = DB::table('user_fists as ur')
                -> join('fists as col', 'ur.fist_id','=','col.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('col.id as id', 'col.name as name', 'ur.owned as owned',
                        'col.blueprint as r_blueprint', 'col.blade as r_blade', 'col.gauntlet as r_gauntlet',
                        'ur.blueprint as blueprint', 'ur.blade as blade', 'ur.gauntlet as gauntlet')
                ->where('ur.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($fist); $i++)
        {
            $this->id_fist[$i] = $fist[$i]->id;
            $this->name[$i] = $fist[$i]->name;
            $this->owned[$i] = $fist[$i]->owned;
            $this->blueprint[$i] = $fist[$i]->blueprint;
            $this->r_blueprint[$i] = $fist[$i]->r_blueprint;
            $this->blade[$i] = $fist[$i]->blade;
            $this->r_blade[$i] = $fist[$i]->r_blade;
            $this->gauntlet[$i] = $fist[$i]->gauntlet;
            $this->r_gauntlet[$i] = $fist[$i]->r_gauntlet;
        }

        return view('livewire.fist-table')->with([
            'fists' => $fist
        ]);
    }

    public function update_user_fist(){
        for ($i = 0; $i < count($this->id_fist); $i++)
        {
            $fist = UserFist::where('fist_id', $this->id_fist[$i])->where('user_id', Auth::user()->id)->first();
            $fist->owned = $this->owned[$i];
            $fist->blueprint = (int)$this->blueprint[$i];
            $fist->blade = (int)$this->blade[$i];
            $fist->gauntlet = (int)$this->gauntlet[$i];
            $fist->save();
        }
    }
}