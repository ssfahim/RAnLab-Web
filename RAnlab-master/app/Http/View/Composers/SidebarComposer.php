<?php

namespace App\Http\View\Composers;

use App\Models\Demography;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class SidebarComposer
{
    protected $regions;

    public function __construct()
    {
        $this->regions = Demography::select('id','geog_text')
            ->where('id', '!=', 1)
            ->orderBy('geog_text')
            ->get()
            ->toArray();
        array_unshift($this->regions, Demography::find(1));
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('regions', $this->regions);
    }
}
