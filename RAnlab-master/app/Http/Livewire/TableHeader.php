<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class TableHeader extends Component
{
    public function render()
    {
        return view('livewire.table-header');
    }

    public abstract function filters() : array;
}
