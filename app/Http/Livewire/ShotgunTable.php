<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserShotgun;
use Auth;

class ShotgunTable extends Component
{
    public $id_shotgun = [];
    public $name = [];
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
        $shotgun = DB::table('user_shotguns as us')
                -> join('shotguns as s', 'us.shotgun_id','=','s.id')
                -> join('users as u', 'us.user_id','=','u.id')
                ->select('s.id as id', 's.name as name', 's.blueprint as r_blueprint', 's.barrel as r_barrel',
                        's.receiver as r_receiver', 's.stock as r_stock', 'us.blueprint as blueprint', 'us.barrel as barrel', 'us.receiver as receiver', 'us.stock as stock')
                ->where('us.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($shotgun); $i++)
        {
            $this->id_shotgun[$i] = $shotgun[$i]->id;
            $this->name[$i] = $shotgun[$i]->name;
            $this->blueprint[$i] = $shotgun[$i]->blueprint;
            $this->r_blueprint[$i] = $shotgun[$i]->r_blueprint;
            $this->barrel[$i] = $shotgun[$i]->barrel;
            $this->r_barrel[$i] = $shotgun[$i]->r_barrel;
            $this->receiver[$i] = $shotgun[$i]->receiver;
            $this->r_receiver[$i] = $shotgun[$i]->r_receiver;
            $this->stock[$i] = $shotgun[$i]->stock;
            $this->r_stock[$i] = $shotgun[$i]->r_stock;
        }

        return view('livewire.shotgun-table')->with([
            'shotguns' => $shotgun
        ]);
    }

    public function update_user_shotgun(){
        for ($i = 0; $i < count($this->id_shotgun); $i++)
        {
            $rifle = UserShotgun::where('shotgun_id', $this->id_shotgun[$i])->where('user_id', Auth::user()->id)->first();
            $rifle->blueprint = $this->blueprint[$i];
            $rifle->barrel = $this->barrel[$i];
            $rifle->receiver = $this->receiver[$i];
            $rifle->stock = $this->stock[$i];
            $rifle->save();
        }
    }
}