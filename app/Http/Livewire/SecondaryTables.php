<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SecondaryTables extends Component
{
    public $filter;

    public function render()
    {
        $this->emit('refresh', $this->filter);
        return view('livewire.secondary-tables');
    }
}
