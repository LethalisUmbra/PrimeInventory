<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\UserStaff;
use Auth;

class StaffTable extends Component
{
    public $id_staff = [];
    public $name = [];
    public $owned = [];
    public $blueprint = [];
    public $r_blueprint = [];
    public $ornament = [];
    public $r_ornament = [];
    public $handle = [];
    public $r_handle = [];

    public function render()
    {
        $staff = DB::table('user_staffs as ub')
                -> join('staffs as b', 'ub.staff_id','=','b.id')
                -> join('users as u', 'ub.user_id','=','u.id')
                ->select('b.id as id', 'b.name as name', 'ub.owned as owned',
                        'b.blueprint as r_blueprint', 'b.ornament as r_ornament', 'b.handle as r_handle',
                        'ub.blueprint as blueprint', 'ub.ornament as ornament', 'ub.handle as handle')
                ->where('ub.user_id','=',Auth::user()->id)->get();

        for ($i = 0; $i < count($staff); $i++)
        {
            $this->id_staff[$i] = $staff[$i]->id;
            $this->name[$i] = $staff[$i]->name;
            $this->owned[$i] = $staff[$i]->owned;
            $this->blueprint[$i] = $staff[$i]->blueprint;
            $this->r_blueprint[$i] = $staff[$i]->r_blueprint;
            $this->ornament[$i] = $staff[$i]->ornament;
            $this->r_ornament[$i] = $staff[$i]->r_ornament;
            $this->handle[$i] = $staff[$i]->handle;
            $this->r_handle[$i] = $staff[$i]->r_handle;
        }

        return view('livewire.staff-table')->with([
            'staffs' => $staff
        ]);
    }

    public function update_user_staff(){
        for ($i = 0; $i < count($this->id_staff); $i++)
        {
            // $staff = DB::table('user_staffs')->where('user_id', Auth::user()->id)->first();
            $staff = UserStaff::where('staff_id', $this->id_staff[$i])->where('user_id', Auth::user()->id)->first();
            $staff->owned = $this->owned[$i];
            $staff->blueprint = (int)$this->blueprint[$i];
            $staff->ornament = (int)$this->ornament[$i];
            $staff->handle = (int)$this->handle[$i];
            $staff->save();
        }
    }
}
