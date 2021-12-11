<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserRifle;
use Auth;

class RifleTable extends Component
{
    public $id_rifle = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $barrel = [];
    public $r_barrel = [];
    public $receiver = [];
    public $r_receiver = [];
    public $stock = [];
    public $r_stock = [];


    public function render()
    {
        $rifle = DB::table('user_rifles as ur')
                -> join('rifles as r', 'ur.rifle_id','=','r.id')
                -> join('users as u', 'ur.user_id','=','u.id')
                ->select('r.id as id', 'r.name as name', 'ur.owned as owned',
                        'r.blueprint as r_blueprint', 'r.barrel as r_barrel', 'r.receiver as r_receiver', 'r.stock as r_stock',
                        'ur.blueprint as blueprint', 'ur.barrel as barrel', 'ur.receiver as receiver', 'ur.stock as stock')
                ->where('ur.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($rifle); $i++)
        {
            $this->id_rifle[$i] = $rifle[$i]->id;
            $this->name[$i] = $rifle[$i]->name;
            $this->owned[$i] = $rifle[$i]->owned;
            $this->blueprint[$i] = $rifle[$i]->blueprint;
            $this->r_blueprint[$i] = $rifle[$i]->r_blueprint;
            $this->barrel[$i] = $rifle[$i]->barrel;
            $this->r_barrel[$i] = $rifle[$i]->r_barrel;
            $this->receiver[$i] = $rifle[$i]->receiver;
            $this->r_receiver[$i] = $rifle[$i]->r_receiver;
            $this->stock[$i] = $rifle[$i]->stock;
            $this->r_stock[$i] = $rifle[$i]->r_stock;
        }

        return view('livewire.rifle-table')->with([
            'rifles' => $rifle
        ]);
    }

    public function update_user_rifle(){
        for ($i = 0; $i < count($this->id_rifle); $i++)
        {
            $rifle = UserRifle::where('rifle_id', $this->id_rifle[$i])->where('user_id', Auth::user()->id)->first();
            $rifle->owned = $this->owned[$i];
            $rifle->blueprint = (int)$this->blueprint[$i];
            $rifle->barrel = (int)$this->barrel[$i];
            $rifle->receiver = (int)$this->receiver[$i];
            $rifle->stock = (int)$this->stock[$i];
            $rifle->save();
        }
    }
}