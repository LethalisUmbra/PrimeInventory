<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $filter;
    public $category;

    public function render()
    {
        $this->emit('refresh', $this->filter);

        switch ($this->category) {
            case 'primary':
                return view('livewire.primary.index');
                break;
            case 'secondary':
                return view('livewire.secondary.index');
                break;
            case 'melee':
                return view('livewire.melee.index');
                break;
            case 'archgun':
                return view('livewire.archgun.index');
                break;
            case 'warframe':
                return view('livewire.warframe.index');
                break;
            case 'companion':
                return view('livewire.companion.index');
                break;
            case 'archwing':
                return view('livewire.archwing.index');
                break;
            default:
                return view('empty');
                break;
        }
    }
}