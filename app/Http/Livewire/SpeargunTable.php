<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSpeargun;
use Auth;

class SpeargunTable extends Component
{
    public $id_speargun = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $blade = [];
    public $r_blade = [];
    public $barrel = [];
    public $r_barrel = [];
    public $handle = [];
    public $r_handle = [];

    public function render()
    {
        $speargun = DB::table('user_spearguns as ub')
                -> join('spearguns as b', 'ub.speargun_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.blade as r_blade', 'b.barrel as r_barrel', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.blade as blade', 'ub.barrel as barrel', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($speargun); $i++)
        {
            $this->id_speargun[$i] = $speargun[$i]->id;
            $this->name[$i] = $speargun[$i]->name;
            $this->owned[$i] = $speargun[$i]->owned;
            $this->blueprint[$i] = $speargun[$i]->blueprint;
            $this->r_blueprint[$i] = $speargun[$i]->r_blueprint;
            $this->blade[$i] = $speargun[$i]->blade;
            $this->r_blade[$i] = $speargun[$i]->r_blade;
            $this->barrel[$i] = $speargun[$i]->barrel;
            $this->r_barrel[$i] = $speargun[$i]->r_barrel;
            $this->handle[$i] = $speargun[$i]->handle;
            $this->r_handle[$i] = $speargun[$i]->r_handle;
        }

        return view('livewire.speargun-table')->with([
            'spearguns' => $speargun
        ]);
    }

    public function update_user_speargun(){
        for ($i = 0; $i < count($this->id_speargun); $i++)
        {
            $speargun = UserSpeargun::where('speargun_id', $this->id_speargun[$i])->where('user_id', Auth::user()->id)->first();
            $speargun->owned = $this->owned[$i];
            $speargun->blueprint = (int)$this->blueprint[$i];
            $speargun->blade = (int)$this->blade[$i];
            $speargun->barrel = (int)$this->barrel[$i];
            $speargun->handle = (int)$this->handle[$i];
            $speargun->save();
        }
    }
}
