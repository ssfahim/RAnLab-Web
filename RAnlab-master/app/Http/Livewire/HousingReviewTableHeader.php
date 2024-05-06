<?php

namespace App\Http\Livewire;

use App\Models\HousingReview;
use App\Table\TableFilter;

class HousingReviewTableHeader extends TableHeader
{
    public function filters(): array
    {
        $yearContent = $this->getYearContent();
        $housing_structure = $this->getHousingStructure();
        $number_Of_bedrooms = $this->getBedrooms();
        return [
            TableFilter::make('year','Year',$yearContent),
            TableFilter::make('house_structure','House Structure',$housing_structure),
            TableFilter::make('number_Of_bedrooms','Number of bedrooms',$number_Of_bedrooms),
        ];
	}

    private function getYearContent(): array
    {
        $content = [];
        $raw = HousingReview::select('year')
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

    private function getHousingStructure(): array
    {
        $content = [];
        $raw = HousingReview::select('house_structure')
            ->distinct()
            ->orderBy('house_structure','asc')
            ->get()
            ->toArray();

        foreach($raw as $value)
        {
            array_push($content, $value['house_structure']);
        }

        return $content;
    }

    private function getBedrooms() : array
    {
        $content = [];
        $raw = HousingReview::select('number_Of_bedrooms')
            ->distinct()
            ->orderBy('number_Of_bedrooms','asc')
            ->get()
            ->toArray();

        foreach($raw as $value)
        {
            array_push($content, $value['number_Of_bedrooms']);
        }

        return $content;
    }

}
