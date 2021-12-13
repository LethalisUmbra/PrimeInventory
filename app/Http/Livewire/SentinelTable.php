<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSentinel;
use Auth;

class SentinelTable extends Component
{
    public $id_sentinel = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $cerebrum = [];
    public $r_cerebrum = [];
    public $carapace = [];
    public $r_carapace = [];
    public $systems = [];
    public $r_systems = [];


    public function render()
    {
        $sentinel = DB::table('user_sentinels as us')
                -> join('sentinels as sen', 'us.sentinel_id','=','sen.id')
                -> join('users as u', 'us.user_id','=','u.id')
                ->select('sen.id as id', 'sen.name as name', 'us.owned as owned',
                        'sen.blueprint as r_blueprint', 'sen.cerebrum as r_cerebrum', 'sen.carapace as r_carapace', 'sen.systems as r_systems',
                        'us.blueprint as blueprint', 'us.cerebrum as cerebrum', 'us.carapace as carapace', 'us.systems as systems')
                ->where('us.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($sentinel); $i++)
        {
            $this->id_sentinel[$i] = $sentinel[$i]->id;
            $this->name[$i] = $sentinel[$i]->name;
            $this->owned[$i] = $sentinel[$i]->owned;
            $this->blueprint[$i] = $sentinel[$i]->blueprint;
            $this->r_blueprint[$i] = $sentinel[$i]->r_blueprint;
            $this->cerebrum[$i] = $sentinel[$i]->cerebrum;
            $this->r_cerebrum[$i] = $sentinel[$i]->r_cerebrum;
            $this->carapace[$i] = $sentinel[$i]->carapace;
            $this->r_carapace[$i] = $sentinel[$i]->r_carapace;
            $this->systems[$i] = $sentinel[$i]->systems;
            $this->r_systems[$i] = $sentinel[$i]->r_systems;
        }

        return view('livewire.sentinel-table')->with([
            'sentinels' => $sentinel
        ]);
    }

    public function update_user_sentinel(){
        for ($i = 0; $i < count($this->id_sentinel); $i++)
        {
            $sentinel = UserSentinel::where('sentinel_id', $this->id_sentinel[$i])->where('user_id', Auth::user()->id)->first();
            $sentinel->owned = $this->owned[$i];
            $sentinel->blueprint = (int)$this->blueprint[$i];
            $sentinel->cerebrum = (int)$this->cerebrum[$i];
            $sentinel->carapace = (int)$this->carapace[$i];
            $sentinel->systems = (int)$this->systems[$i];
            $sentinel->save();
        }
    }
}