<?php

namespace App\Http\Livewire;

use App\Models\Housing;
use App\Table\TableFilter;

class HousingTableHeader extends TableHeader
{
    public function filters(): array
    {
        $regionContent = $this->getRegionContent();

        return [
            TableFilter::make('CSDTxt','Region',$regionContent),
        ];
	}

    private function getRegionContent() : array
    {
        $content = [];
        $raw = Housing::select('CSDTxt')
            ->distinct()
            ->orderBy('CSDTxt','asc')
            ->get()
            ->toArray();

        foreach($raw as $key => $value)
        {
            array_push($content, $value['CSDTxt']);
        }

        return $content;
    }
}
