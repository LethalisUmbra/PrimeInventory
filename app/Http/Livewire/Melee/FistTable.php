<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserFist;
use Auth;

class FistTable extends Component
{
    public $fist;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->fist = DB::table('user_fists as uf')
            ->join('fists as f', 'uf.fist_id','=','f.id')
            ->join('users as u', 'uf.user_id','=','u.id')
            ->select('f.id as id', 'f.name as name', 'uf.owned as owned',
                    'f.blueprint as r_blueprint', 'f.blade as r_blade', 'f.gauntlet as r_gauntlet',
                    'uf.blueprint as blueprint', 'uf.blade as blade', 'uf.gauntlet as gauntlet')
            ->where([['user_id','=',Auth::user()->id], ['f.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.melee.fist-table', [
            'fists' => $this->fist,
            'filter' => $this->filter
        ]);
    }

    public function update_user_fist(){
        foreach($this->fist as $fist) {
            $_fist = UserFist::firstWhere([
                ['fist_id', $fist['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_fist->owned = $fist['owned'];
            $_fist->blueprint = (int)$fist['blueprint'];
            $_fist->blade = (int)$fist['blade'];
            $_fist->gauntlet = (int)$fist['gauntlet'];
            $_fist->save();
        }
    }
}
