<?php
namespace App\Http\Livewire\Archwing;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserArchgun;
use Auth;

class ArchgunTable extends Component
{
    public $archgun;
    public $filter;

    protected $listeners = ['refresh'];
    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->archgun = DB::table('user_archguns as ua')
                -> join('archguns as a', 'ua.archgun_id','=','a.id')
                -> join('users as u', 'ua.user_id','=','u.id')
                ->select('a.id as id', 'a.name as name', 'ua.owned as owned',
                        'a.blueprint as r_blueprint', 'a.barrel as r_barrel', 'a.receiver as r_receiver', 'a.stock as r_stock',
                        'ua.blueprint as blueprint', 'ua.barrel as barrel', 'ua.receiver as receiver', 'ua.stock as stock')
                ->where([['ua.user_id','=',Auth::user()->id], ['a.name', 'LIKE', "%$this->filter%"]])
                ->get();

        return view('livewire.archwing.archgun-table')->with([
            'archguns' => $this->archgun,
            'filter' => $this->filter
        ]);
    }

    public function update_user_archgun(){
        foreach($this->archgun as $archgun) {
            $_archgun = UserArchgun::firstWhere([
                ['archgun_id', $archgun['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_archgun->owned = $archgun['owned'];
            $_archgun->blueprint = (int)$archgun['blueprint'];
            $_archgun->barrel = (int)$archgun['barrel'];
            $_archgun->receiver = (int)$archgun['receiver'];
            $_archgun->stock = (int)$archgun['stock'];
            $_archgun->save();
        }
    }
}