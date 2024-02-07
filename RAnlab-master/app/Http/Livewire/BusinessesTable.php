<?php

namespace App\Http\Livewire;

use App\Table\Column;
use App\Models\Business;
use Illuminate\Database\Eloquent\Builder;
use Session;

class BusinessesTable extends Table
{
    protected $listeners = [
        'yearFilterSelected' => 'applyYearFilter',
        'industryFilterSelected' => 'applyIndustryFilter'
    ];

    public function renderHeader()
    {
        return view('livewire.business-table-header');
    }

    public function query() : Builder
    {
        $query = Business::queryWithRegionName()
            ->where('is_master',true)
            ->where('is_draft',false);
        if(Session::has('regionId') && Session::get('regionId') != 0)
        {
            $query = $query->where('region',Session::get('regionId'));
        }

        return $query;
    }

    public function columns() : array
    {
        return [
            // Column::make('last_action', 'Action'),
            Column::make('geog_text', 'Region'),
            Column::make('year', 'Year'),
            Column::make('industry', 'Industry'),
            Column::make('name', 'Business Name'),
            Column::make('employment', 'Direct Employment'),
            Column::make('location', 'Location'),
        ];
    }

    public function applyYearFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'year';
        $this->filterValue = $value;
    }

    public function applyIndustryFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'industry';
        $this->filterValue = $value;
    }
}
