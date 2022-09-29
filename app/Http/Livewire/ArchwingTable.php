<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserArchwing;
use Auth;

class ArchwingTable extends Component
{
    public $archwing;
    public $filter;

    protected $listeners = ['refresh'];
    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->archwing = DB::table('user_archwings as ua')
                -> join('archwings as a', 'ua.archwing_id','=','a.id')
                -> join('users as u', 'ua.user_id','=','u.id')
                ->select('a.id as id', 'a.name as name', 'ua.owned as owned',
                        'a.blueprint as r_blueprint', 'a.harness as r_harness', 'a.wings as r_wings', 'a.systems as r_systems',
                        'ua.blueprint as blueprint', 'ua.harness as harness', 'ua.wings as wings', 'ua.systems as systems')
                ->where([['ua.user_id','=',Auth::user()->id], ['a.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.archwing-table', [
            'archwings' => $this->archwing,
            'filter' => $this->filter
        ]);
    }

    public function update_user_archwing(){
        foreach($this->archwing as $archwing) {
            $_archwing = UserArchwing::firstWhere([
                ['archwing_id', $archwing['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_archwing->owned = $archwing['owned'];
            $_archwing->blueprint = (int)$archwing['blueprint'];
            $_archwing->harness = (int)$archwing['harness'];
            $_archwing->wings = (int)$archwing['wings'];
            $_archwing->systems = (int)$archwing['systems'];
            $_archwing->save();
        }
    }
}