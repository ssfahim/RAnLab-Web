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

    // public function query(): Builder
    // {
    //     $query = Housing::query();

    //     // Determine regionId based on session or user authentication
    //     $regionId = Session::has('regionId') ? Session::get('regionId') : null;

    //     if (auth()->check()) {
    //         if (auth()->user()->email === 'test@test.com') {
    //             $regionId = 91;
    //             if(Session::has('regionId') && Session::get('regionId') != 0)
    //             {
    //                 $query = $query->where('CSDID',Session::get('regionId'));
    //             }
    //             $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
    //                 ->orderBy('CSDTxt');
    //         } else {
    //             $regionId = auth()->user()->city;
    //             if ($regionId !== null && $regionId != 0) {
    //                 $query = $query->where('CSDID', $regionId);
    //             }
        
    //             // Order the results
    //             $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
    //                         ->orderBy('CSDTxt');
    //         }
    //     }
        
    //     return $query;
    // }

    public function query(): Builder{
        $query = Housing::query();

        // Determine regionId based on session or user authentication
        $regionIdSession = Session::has('regionId') ? Session::get('regionId') : null;
        $regionIdUser = auth()->check() ? auth()->user()->city : null;

        // Special handling for test user
        if (auth()->check() && auth()->user()->email === 'test@test.com') {
            $regionIdSession = 91;
            if (Session::has('regionId') && Session::get('regionId') != 0) {
                $query = $query->where('CSDID', Session::get('regionId'));
            }
            $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                        ->orderBy('CSDTxt');
        } else {
            // Collect queries based on session and user city
            $queries = [];

            // Query based on session regionId
            if ($regionIdSession !== null && $regionIdSession != 0) {
                $sessionQuery = Housing::where('CSDID', $regionIdSession);
                $queries[] = $sessionQuery;
            }

            // Query based on user city
            if ($regionIdUser !== null && $regionIdUser != 0) {
                $userQuery = Housing::where('CSDID', $regionIdUser);
                $queries[] = $userQuery;
            }

            // Combine the queries using union
            if (count($queries) > 0) {
                $combinedQuery = array_shift($queries); // Get the first query
                foreach ($queries as $q) {
                    $combinedQuery = $combinedQuery->union($q);
                }
                $query = $combinedQuery;
            }

            // Order the results
            $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                        ->orderBy('CSDTxt');
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
