<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filter extends Component
{
    public $filter;
    public $category;

    public function render()
    {
        $this->emit('refresh', $this->filter);
        $category = strtolower($this->category);

        return view('livewire.filter');
    }
}