<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Table\TableFilter;

class BusinessTableHeader extends TableHeader
{

	/**
	 * @return array
	 */
	public function filters(): array
    {
        $yearContent = $this->getYearContent();
        $industryContent = $this->getIndustryContent();
        return [
            TableFilter::make('year','Year',$yearContent),
            TableFilter::make('industry','Industry',$industryContent),
        ];
	}

    private function getYearContent() : array
    {
        $content = [];
        $raw = Business::select('year')
            ->distinct()
            ->where('is_master', true)
            ->orderBy('year','desc')
            ->get()
            ->toArray();

        foreach($raw as $value)
        {
            array_push($content, $value['year']);
        }
        // dd($content);
        return $content;
    }

    private function getIndustryContent() : array
    {
        $content = [];
        $raw = Business::select('industry')
            ->distinct()
            ->where('is_master', true)
            ->orderBy('industry','asc')
            ->get()
            ->toArray();

        foreach($raw as $value)
        {
            array_push($content, $value['industry']);
        }

        return $content;
    }
}
