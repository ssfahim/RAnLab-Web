<?php

namespace App\Http\Livewire;

use App\Table\Column;
use App\Models\Demography;
use App\Models\Labour;
use Illuminate\Database\Eloquent\Builder;
use Session;

class LabourTable extends Table
{
    protected $listeners = [
        'geog_textFilterSelected' => 'applyRegionFilter',
    ];

    public function renderHeader()
    {
        // return view('livewire.housing-table');
    }

    public function query(): Builder
    {
        $query = Labour::query();

        // Determine regionId based on session or user authentication
        $regionId = Session::has('regionId') ? Session::get('regionId') : null;

        if (auth()->check()) {
            if (auth()->user()->email === 'test@test.com') {
                $regionId = 91;
                if(Session::has('regionId') && Session::get('regionId') != 0)
                {
                    $query = $query->where('CSDID',Session::get('regionId'));
                }
                $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                    ->orderBy('CSDTxt');
            } else {
                $regionId = auth()->user()->city;
                if ($regionId !== null && $regionId != 0) {
                    $query = $query->where('CSDID', $regionId);
                }
        
                // Order the results
                $query = $query->orderByRaw('CASE WHEN CSDID=1 THEN 0 ELSE 1 END ASC')
                            ->orderBy('CSDTxt');
            }
        }
        
        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make('CSDTxt', 'Region'),
            Column::make('Total_Highest_certificate_diploma_or_degree', 'Total - Highest certificate, diploma or degree for the population aged 25 to 64 years'),
            Column::make('No_certificate_diploma_or_degree', 'No certificate, diploma or degree'),
            Column::make('High_school_diploma', 'High (secondary) school diploma or equivalency certificate'),
            Column::make('Postsecondary_certificate_or_diploma_below_bachelor', "Postsecondary certificate or diploma below bachelor level"),
            Column::make('Bachelor_degree', "Bachelor's degree"),
            Column::make('University_certificate_or_diploma_above_bachelor', 'University certificate or diploma above bachelor level'),
            Column::make('Total_Population_aged_15_years_and_over_by_labour_force', 'Total - Population aged 15 years and over by labour force status'),
            Column::make('Participation_rate', 'Participation rate'),
            Column::make('Unemployment_rate', 'Unemployment rate'),
            Column::make('Average_weeks_worked_in_reference_year', 'Average weeks worked in reference year'),
            Column::make('Worked_full_year_full_time', 'Worked full year full time'),
            Column::make('Worked_part_year_and_or_part_time', 'Worked part year and/or part time'),
            Column::make('Occupation_not_applicable', 'Occupation - not applicable'),
            Column::make('All_occupations', 'All occupations'),
            Column::make('Legislative_and_senior_management_occupations', '0 Legislative and senior management occupations'),
            Column::make('Business_finance_and_administration_occupations', '1 Business, finance and administration occupations'),
            Column::make('Natural_and_applied_sciences_and_related_occupations', '2 Natural and applied sciences and related occupations'),
            Column::make('Health_occupations', '3 Health occupations'),
            Column::make('Occupations_in_education_law_and_social', '4 Education, law and social, community and government services'),
            Column::make('Occupations_in_art_culture_recreation_and_sport', '5 Art, culture, recreation and sport'),
            Column::make('Sales_and_service_occupations', '6 Sales and service'),
            Column::make('Trades_transport_and_equipment_operators', '7 Trades, transport and equipment operators and related occupations'),
            Column::make('Natural_resources_agriculture_and_related', '8 Natural resources, agriculture and related production occupations'),
            Column::make('Occupations_in_manufacturing_and_utilities', '9 Manufacturing and utilities'),
        ];
	}

    public function applyRegionFilter($value)
    {
        $this->resetPage();

        $this->filterBy = 'CSDTxt';
        $this->filterValue = $value;
    }
}
