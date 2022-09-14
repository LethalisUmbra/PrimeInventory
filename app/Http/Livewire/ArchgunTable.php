<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserArchgun;
use Auth;

class ArchgunTable extends Component
{
    public $id_archgun = [];
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
        $archguns = DB::table('user_archguns as uw')
                -> join('archguns as w', 'uw.archguns_id','=','w.id')
                -> join('users as u', 'uw.user_id','=','u.id')
                ->select('w.id as id', 'w.name as name', 'uw.owned as owned',
                        'w.blueprint as r_blueprint', 'w.barrel as r_barrel', 'w.receiver as r_receiver', 'w.stock as r_stock',
                        'uw.blueprint as blueprint', 'uw.barrel as barrel', 'uw.receiver as receiver', 'uw.stock as stock')
                ->where('uw.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($archguns); $i++)
        {
            $this->id_archgun[$i] = $archguns[$i]->id;
            $this->name[$i] = $archguns[$i]->name;
            $this->owned[$i] = $archguns[$i]->owned;
            $this->blueprint[$i] = $archguns[$i]->blueprint;
            $this->r_blueprint[$i] = $archguns[$i]->r_blueprint;
            $this->barrel[$i] = $archguns[$i]->barrel;
            $this->r_barrel[$i] = $archguns[$i]->r_barrel;
            $this->receiver[$i] = $archguns[$i]->receiver;
            $this->r_receiver[$i] = $archguns[$i]->r_receiver;
            $this->stock[$i] = $archguns[$i]->stock;
            $this->r_stock[$i] = $archguns[$i]->r_stock;
        }

        return view('livewire.archgun-table')->with([
            'archguns' => $archguns
        ]);
    }

    public function update_user_archgun(){
        for ($i = 0; $i < count($this->id_archgun); $i++)
        {
            $archgun = UserArchgun::where('archgun_id', $this->id_archgun[$i])->where('user_id', Auth::user()->id)->first();
            $archgun->owned = $this->owned[$i];
            $archgun->blueprint = (int)$this->blueprint[$i];
            $archgun->barrel = (int)$this->barrel[$i];
            $archgun->receiver = (int)$this->receiver[$i];
            $archgun->stock = (int)$this->stock[$i];
            $archgun->save();
        }
    }
}