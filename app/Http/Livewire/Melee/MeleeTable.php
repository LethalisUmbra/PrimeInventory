<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserMelee;
use Auth;

class MeleeTable extends Component
{
    public $melee;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->melee = DB::table('user_melees as um')
            ->join('melees as m', 'um.melee_id','=','m.id')
            ->join('users as u', 'um.user_id','=','u.id')
            ->select('m.id as id', 'm.name as name', 'um.owned as owned',
                    'm.blueprint as r_blueprint', 'm.blade as r_blade', 'm.handle as r_handle',
                    'um.blueprint as blueprint', 'um.blade as blade', 'um.handle as handle')
            ->where([['user_id','=',Auth::user()->id], ['m.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.melee.melee-table', [
            'melees' => $this->melee,
            'filter' => $this->filter
        ]);
    }

    public function update_user_melee(){
        foreach($this->melee as $melee) {
            $_melee = UserMelee::firstWhere([
                ['melee_id', $melee['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_melee->owned = $melee['owned'];
            $_melee->blueprint = (int)$melee['blueprint'];
            $_melee->blade = (int)$melee['blade'];
            $_melee->handle = (int)$melee['handle'];
            $_melee->save();
        }
    }
}
