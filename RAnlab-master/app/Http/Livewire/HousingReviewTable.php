<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Table\Column;
use App\Models\Demography;
use App\Models\HousingReview;
use Illuminate\Database\Eloquent\Builder;
use Session;

class HousingReviewTable extends Table
{
    protected $listeners = [
        'yearFilterSelected' => 'applyYearFilter',
        'housingStructureFilterSelected' => 'applyHousingStructureFilter',
        'bedroomFilterSelected' => 'applybedroomFilter'
    ];

    public function renderHeader()
    {
        return view('livewire.housing-review-table-header');
    }

    public function query(): Builder
    {
        $query = HousingReview::query();

        // Determine regionId based on session or user authentication
        // $regionId = Session::has('regionId') ? Session::get('regionId') : null;

        // if (auth()->check()) {
        //     if (auth()->user()->email === 'test@test.com') {
        //         $regionId = 91;
        //         if(Session::has('regionId') && Session::get('regionId') != 0)
        //         {
        //             $query = $query->where('CSDID',Session::get('regionId'));
        //         }
        //         $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
        //             ->orderBy('CSDTxt');
        //     } else {
        //         $regionId = auth()->user()->city;
        //         if ($regionId !== null && $regionId != 0) {
        //             $query = $query->where('CSDID', $regionId);
        //         }
        
        //         // Order the results
        //         $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
        //                     ->orderBy('CSDTxt');
        //     }
        // }

        if(Session::has('regionId') && Session::get('regionId') != 0)
        {
            $query = $query->where('CSDID',Session::get('regionId'));
        }
        if (auth()->check()) {
            if (auth()->user()->email === 'test@test.com') {
                $regionId = 91;
                if(Session::has('regionId') && Session::get('regionId') != 0)
                {
                    $query = $query->where('CSDID',Session::get('regionId'));
                }
                
            } else {
                $regionId = auth()->user()->city;
                if ($regionId !== null && $regionId != 0) {
                    $query = $query->where('CSDID', $regionId);
                }
            }
        }
        
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make('CSDTxt', 'Region'),
            Column::make('year', 'Year'),
            Column::make('house_structure', 'House Structure'),
            Column::make('number_Of_bedrooms', 'Number of Bedrooms'),
            // Column::make('Average_household_size', 'Average household size'),
            Column::make('location', 'Location'),
        ];
	}

    public function applyYearFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'year';
        $this->filterValue = $value;
    }

    public function applyHousingStructureFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'house_structure';
        $this->filterValue = $value;
    }

    public function applybedroomFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'number_Of_bedrooms';
        $this->filterValue = $value;
    }
}
