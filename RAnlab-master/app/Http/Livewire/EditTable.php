<?php

namespace App\Http\Livewire;

abstract class EditTable extends Table
{
    public function render()
    {
        return view('livewire.edit-table');
    }

}
