<?php

namespace App\Http\Livewire;

use App\Models\Demography;
use App\Table\TableFilter;

class DemographyTableHeader extends TableHeader
{
    public function filters(): array
    {
        $regionContent = $this->getRegionContent();

        return [
            TableFilter::make('geog_text','Region',$regionContent),
        ];
	}

    private function getRegionContent() : array
    {
        $content = [];
        $raw = Demography::select('geog_text')
            ->distinct()
            ->orderBy('geog_text','asc')
            ->get()
            ->toArray();

        foreach($raw as $key => $value)
        {
            array_push($content, $value['geog_text']);
        }

        return $content;
    }
}
