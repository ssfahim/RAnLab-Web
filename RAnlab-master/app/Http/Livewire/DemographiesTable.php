<?php

namespace App\Http\Livewire;

use App\Table\Column;
use App\Models\Demography;
use App\Models\Dashboard;
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
        $query = Dashboard::query();

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
            Column::make('Population_2016', 'Population in 2016'),
            Column::make('Population_2021', 'Population in 2021'),
            Column::make('Population_percentage_change_2016_to_2021', '% Population Change'),
            Column::make('Private_dwellings_occupied_by_usual_residents', 'Private Dwellings occupied by usal Residents'),
            Column::make('Private_dwellings_not_occupied_by_usual_residents', 'Private Dwellings not occupied by usal Residents'),
            Column::make('Total_private_dwellings', 'Total Private Dwellings'),
            Column::make('Age_distribution_0_to_14', 'Age Distribution 0 to 14'),
            Column::make('Age_distribution_15_to_64', 'Age Distribution 15 to 64'),
            Column::make('Age_distribution_65_years_and_over', 'Age Distribution 65 and over'),
        ];
	}

    public function applyRegionFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'CSDTxt';
        $this->filterValue = $value;
    }
}




// <?php

// namespace App\Http\Livewire;

// use App\Table\Column;
// use App\Models\Demography;
// use Illuminate\Database\Eloquent\Builder;
// use Session;

// class DemographiesTable extends Table
// {
//     protected $listeners = [
//         'geog_textFilterSelected' => 'applyRegionFilter',
//     ];

//     public function renderHeader()
//     {
//         // return view('livewire.demography-table-header');
// 	}

// 	public function query(): Builder
//     {
//         $query = Demography::query();
//         if(Session::has('regionId') && Session::get('regionId') != 0)
//         {
//             $query = $query->where('id',Session::get('regionId'));
//         }
//         $query = $query->orderByRaw('CASE WHEN id=1 THEN 0 ELSE 1 END ASC')
//             ->orderBy('geog_text');

//         return $query;
// 	}

// 	public function columns(): array
//     {
//         return [
//             Column::make('geog_text', 'Region'),
//             Column::make('population_total', 'Population'),
//             Column::make('percent_change_0_14', '% Change 0-14'),
//             Column::make('percent_change_15_64', '% Change 15-64'),
//             Column::make('percent_change_65_up', '% Change 65+'),
//             Column::make('dependency_ratio_youth', 'Youth Dependency Ratio'),
//             Column::make('dependency_ratio_senior', 'Senior Dependency Ratio'),
//             Column::make('dependency_ratio_combined', 'Combined Dependency Ratio'),
//         ];
// 	}

//     public function applyRegionFilter($value)
//     {
//         $this->resetPage();

//         $this->filterBy = 'geog_text';
//         $this->filterValue = $value;
//     }
// }

