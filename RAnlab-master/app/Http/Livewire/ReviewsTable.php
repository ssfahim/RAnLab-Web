<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Table\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ReviewsTable extends Table
{
    public $isPending = false;

	/**
	 * @return mixed
	 */
	public function renderHeader()
    {

	}

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(): Builder
    {
        // return Review::query();
        return Review::select([
            'reviews.*',
            DB::raw('CONCAT(submitted_by.first_name, " ", submitted_by.last_name) as submitted_by_name'),
            DB::raw('CONCAT(reviewer.first_name, " ", reviewer.last_name) as reviewer_name'),
        ])
            ->join('users as submitted_by', 'submitted_by.id', '=', 'reviews.submitted_by_id')
            ->leftJoin('users as reviewer', 'reviewer.id', '=', 'reviews.reviewer_id');
    
	}

    public function data()
    {
        return $this
            ->query()
            ->when($this->isPending, function ($query) {
                $query->where('status', 'Pending');
            })
            ->when(!$this->isPending, function ($query) {
                $query->whereNotIn('status', ['Draft','Pending','Discarded']);
            })
            ->paginate($this->perPage);
    }

	/**
	 * @return array
	 */
	public function columns(): array
    {
        return [
            Column::make('status', 'Region'),
            Column::make('submitted_by_id', 'Submitted By'),
            Column::make('date_submitted', 'Date Submitted'),
            Column::make('date_reviewed', 'Date Reviewed'),
            Column::make('reviewer_id', 'Reviewer'),
            Column::make('status', 'Review Status'),
        ];
	}


    
}
