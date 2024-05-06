<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Table\Column;
use App\Models\Demography;
use App\Models\Housing;
use Illuminate\Database\Eloquent\Builder;
use Session;

class HousingTable extends Table
{
    protected $listeners = [
        'geog_textFilterSelected' => 'applyRegionFilter',
    ];

    public function renderHeader()
    {
        // return view('livewire.housing-table');
    }

    public function query(): Builder
    {
        $query = Housing::query();

        // Determine regionId based on session or user authentication
        $regionId = Session::has('regionId') ? Session::get('regionId') : null;

        if (auth()->check()) {
            if (auth()->user()->email === 'test@test.com') {
                $regionId = 91;
                if(Session::has('regionId') && Session::get('regionId') != 0)
                {
                    $query = $query->where('CSDID',Session::get('regionId'));
                }
                $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                    ->orderBy('CSDTxt');
            } else {
                $regionId = auth()->user()->city;
                if ($regionId !== null && $regionId != 0) {
                    $query = $query->where('CSDID', $regionId);
                }
        
                // Order the results
                $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                            ->orderBy('CSDTxt');
            }
        }
        
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make('CSDTxt', 'Region'),
            Column::make('Total_private_dwellings', 'Total Private Dwellings'),
            Column::make('Private_dwellings_occupied_by_usual_residents', 'Private Dwellings occupied by usal Residents'),
            Column::make('Private_dwellings_not_occupied_by_usual_residents', 'Private Dwellings not occupied by usal Residents'),
            Column::make('Average_household_size', 'Average household size'),
            Column::make('Owner', 'Owner'),
            Column::make('Renter', 'Renter'),
            Column::make('Total_owner_and_tenant_households_with_household_total_income', 'Total - Owner and tenant households with household total income'),
            Column::make('In_core_need', 'In core need'),
            Column::make('Not_in_core_need', 'Not in core need'),
        ];
	}

    public function applyRegionFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'CSDTxt';
        $this->filterValue = $value;
    }
}
