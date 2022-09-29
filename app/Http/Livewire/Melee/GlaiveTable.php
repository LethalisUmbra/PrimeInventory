<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserGlaive;
use Auth;

class GlaiveTable extends Component
{
    public $glaive;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->glaive = DB::table('user_glaives as ug')
                ->join('glaives as g', 'ug.glaive_id','=','g.id')
                ->join('users as u', 'ug.user_id','=','u.id')
                ->select('g.id as id', 'g.name as name', 'ug.owned as owned',
                        'g.blueprint as r_blueprint', 'g.blade as r_blade', 'g.disc as r_disc',
                        'ug.blueprint as blueprint', 'ug.blade as blade', 'ug.disc as disc')
                ->where([['ug.user_id','=',Auth::user()->id], ['g.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.melee.glaive-table', [
            'glaives' => $this->glaive,
            'filter' => $this->filter
        ]);
    }

    public function update_user_glaive(){
        foreach($this->glaive as $glaive) {
            $_glaive = UserGlaive::firstWhere([
                ['glaive_id', $glaive['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_glaive->owned = $glaive['owned'];
            $_glaive->blueprint = (int)$glaive['blueprint'];
            $_glaive->blade = (int)$glaive['blade'];
            $_glaive->disk = (int)$glaive['disk'];
            $_glaive->save();
        }
    }
}
