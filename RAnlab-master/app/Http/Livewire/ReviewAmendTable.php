<?php

namespace App\Http\Livewire;

class ReviewAmendTable extends BusinessEditTable
{
    public $review;

    public function mount()
    {
        $this->review = request()->review;
    }

    public function renderHeader()
    {
        return view('livewire.review-amend-table-header');
    }

    public function data()
    {
        return $this
            ->query()
            ->where('review_id', '=', $this->review->id)
            ->when($this->filterBy !== '', function ($query) {
                $query->where($this->filterBy, $this->filterValue);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);
    }
}
