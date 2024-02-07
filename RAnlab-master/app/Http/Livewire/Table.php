<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $page = 1;

    public $filterBy;

    public $filterValue;

    public function render()
    {
        return view('livewire.table');
    }

    public abstract function renderHeader();

    public abstract function query() : \Illuminate\Database\Eloquent\Builder;

    public abstract function columns() : array;

    public function data()
    {
        return $this
            ->query()
            ->when($this->filterBy !== '', function ($query) {
                $query->where($this->filterBy, $this->filterValue);
            })
            ->paginate($this->perPage);
    }
}
