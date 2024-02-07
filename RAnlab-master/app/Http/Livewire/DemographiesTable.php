<?php

namespace App\Http\Livewire;

use App\Table\Column;
use App\Models\Demography;
use Illuminate\Database\Eloquent\Builder;
use Session;

class DemographiesTable extends Table
{
    protected $listeners = [
        'geog_textFilterSelected' => 'applyRegionFilter',
    ];

    public function renderHeader()
    {
        // return view('livewire.demography-table-header');
	}

	public function query(): Builder
    {
        $query = Demography::query();
        if(Session::has('regionId') && Session::get('regionId') != 0)
        {
            $query = $query->where('id',Session::get('regionId'));
        }
        $query = $query->orderByRaw('CASE WHEN id=1 THEN 0 ELSE 1 END ASC')
            ->orderBy('geog_text');

        return $query;
	}

	public function columns(): array
    {
        return [
            Column::make('geog_text', 'Region'),
            Column::make('population_total', 'Population'),
            Column::make('percent_change_0_14', '% Change 0-14'),
            Column::make('percent_change_15_64', '% Change 15-64'),
            Column::make('percent_change_65_up', '% Change 65+'),
            Column::make('dependency_ratio_youth', 'Youth Dependency Ratio'),
            Column::make('dependency_ratio_senior', 'Senior Dependency Ratio'),
            Column::make('dependency_ratio_combined', 'Combined Dependency Ratio'),
        ];
	}

    public function applyRegionFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'geog_text';
        $this->filterValue = $value;
    }
}
