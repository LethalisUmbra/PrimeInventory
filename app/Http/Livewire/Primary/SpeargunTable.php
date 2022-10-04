<?php
namespace App\Http\Livewire\Primary;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserSpeargun;
use Auth;

class SpeargunTable extends Component
{
    public $speargun;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->speargun = DB::table('user_spearguns as us')
            -> join('spearguns as s', 'us.speargun_id','=','s.id')
            -> join('users as u', 'us.user_id','=','u.id')
            ->select('s.id as id', 's.name as name', 'us.owned as owned',
                    's.blueprint as r_blueprint', 's.blade as r_blade', 's.barrel as r_barrel', 's.handle as r_handle',
                    'us.blueprint as blueprint', 'us.blade as blade', 'us.barrel as barrel', 'us.handle as handle')
            ->where([['user_id','=',Auth::user()->id], ['s.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.primary.speargun-table', [
            'spearguns' => $this->speargun,
            'filter' => $this->filter
        ]);
    }

    public function update_user_speargun(){
        foreach($this->speargun as $speargun) {
            $_speargun = UserSpeargun::firstWhere([
                ['speargun_id', $speargun['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_speargun->owned = $speargun['owned'];
            $_speargun->blueprint = (int)$speargun['blueprint'];
            $_speargun->blade = (int)$speargun['blade'];
            $_speargun->barrel = (int)$speargun['barrel'];
            $_speargun->handle = (int)$speargun['handle'];
            $_speargun->save();
        }
    }
}