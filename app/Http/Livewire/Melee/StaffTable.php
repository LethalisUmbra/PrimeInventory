<?php
namespace App\Http\Livewire\Melee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserStaff;
use Auth;

class StaffTable extends Component
{
    public $staff;
    public $filter;
    protected $listeners = ['refresh'];

    public function refresh($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $this->staff = DB::table('user_staffs as us')
            ->join('staffs as s', 'us.staff_id','=','s.id')
            ->join('users as u', 'us.user_id','=','u.id')
            ->select('s.id as id', 's.name as name', 'us.owned as owned',
                    's.blueprint as r_blueprint', 's.ornament as r_ornament', 's.handle as r_handle',
                    'us.blueprint as blueprint', 'us.ornament as ornament', 'us.handle as handle')
            ->where([['user_id','=',Auth::user()->id], ['s.name', 'LIKE', "%$this->filter%"]])
            ->get();

        return view('livewire.melee.staff-table', [
            'staffs' => $this->staff,
            'filter' => $this->filter
        ]);
    }

    public function update_user_staff(){
        foreach($this->staff as $staff) {
            $_staff = UserStaff::firstWhere([
                ['staff_id', $staff['id']],
                ['user_id', Auth::user()->id]
            ]);
            $_staff->owned = $staff['owned'];
            $_staff->blueprint = (int)$staff['blueprint'];
            $_staff->ornament = (int)$staff['ornament'];
            $_staff->handle = (int)$staff['handle'];
            $_staff->save();
        }
    }
}
