<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Illuminate\Database\Eloquent\Builder;

class ReviewViewTable extends BusinessesTable
{
    public $review;

    public function mount()
    {
        $this->review = request()->review;
    }

    public function renderHeader()
    {
        return view('livewire.review-view-table-header');
    }

    public function query() : Builder
    {
        return Business::where('review_id', $this->review->id);
    }

    public function data()
    {
        return $this
            ->query()
            ->when($this->filterBy !== '', function ($query) {
                $query->where($this->filterBy, $this->filterValue);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);
    }
}
