<?php
namespace App\Http\Livewire\Warframe;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserWarframe;
use Auth;

class WarframeTable extends Component
{
    public $warframe;
    public $filter;

    protected $listeners = ['refresh'];
    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->warframe = DB::table('user_warframes as uwf')
                -> join('warframes as wf', 'uwf.warframe_id','=','wf.id')
                -> join('users as u', 'uwf.user_id','=','u.id')
                ->select('wf.id as id', 'wf.name as name', 'uwf.owned as owned',
                        'wf.blueprint as r_blueprint', 'wf.neuroptics as r_neuroptics', 'wf.chassis as r_chassis', 'wf.systems as r_systems',
                        'uwf.blueprint as blueprint', 'uwf.neuroptics as neuroptics', 'uwf.chassis as chassis', 'uwf.systems as systems')
                ->where([['user_id','=',Auth::user()->id], ['wf.name', 'LIKE', "%$this->filter%"]])
                ->orderBy('wf.name')
                ->get();

        return view('livewire.warframe.warframe-table')->with([
            'warframes' => $this->warframe,
            'filter' => $this->filter
        ]);
    }

    public function update_user_warframe(){
        foreach($this->warframe as $warframe) {
            $_warframe = UserWarframe::firstWhere([
                ['warframe_id', $warframe['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_warframe->owned = $warframe['owned'];
            $_warframe->blueprint = (int)$warframe['blueprint'];
            $_warframe->neuroptics = (int)$warframe['neuroptics'];
            $_warframe->chassis = (int)$warframe['chassis'];
            $_warframe->systems = (int)$warframe['systems'];
            $_warframe->save();
        }
    }
}