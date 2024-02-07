<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Table\TableFilter;

class BusinessEditTableHeader extends TableHeader
{
    /**
	 * @return array
	 */
	public function filters(): array
    {
        $yearContent = $this->getYearContent();
        $industryContent = $this->getIndustryContent();
        // dd(TableFilter::make('year','Year',$yearContent));
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
