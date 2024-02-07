<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Table\Column;
use App\Models\Business;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Session;

class BusinessEditTable extends EditTable
{
    protected $listeners = [
        'yearFilterSelected' => 'applyYearFilter',
        'industryFilterSelected' => 'applyIndustryFilter'
    ];

    public function renderHeader()
    {
        return view('livewire.business-edit-table-header');
    }

    public function query() : Builder
    {
        $query = Business::queryWithRegionName();
        if(Session::has('regionId') && Session::get('regionId') != 0)
        {
            $query = $query->where('region',Session::get('regionId'));
        }

        return $query;
    }

    public function data()
    {
        $activeReview = Review::where('is_draft', true)
            ->where('created_by_id', Auth::user()->id);

        if($activeReview)
        {
            // do stuff
        }

        return $this
            ->query()
            ->when($this->filterBy !== '', function ($query) {
                $query->where($this->filterBy, $this->filterValue);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);
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

    public function deleteBusiness($id)
    {
    Business::find($id)->delete();
    $this->emit('businessDeleted'); 
    }
}
