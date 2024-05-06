<?php

namespace Database\Seeders;

use App\Models\Labour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LabourSeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datasheet = IOFactory::load('database/data/labour.xlsx')->getActiveSheet();
        $maxCol = $datasheet->getHighestColumn(); // Get the highest column in the Excel file
        $maxColIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($maxCol); // Get the index of the highest column
        $maxRow = $datasheet->getHighestDataRow();
        
        for ($rowNum = $this->FIRST_DATA_ROW; $rowNum <= $maxRow; $rowNum++) {
            $this->persistDataRowAsDashboard($datasheet, $rowNum, $maxColIndex);
        }
    }

    private function persistDataRowAsDashboard($datasheet, int $rowNum, int $maxColIndex)
    {
        if ($rowNum === $this->FIRST_DATA_ROW) {
            return;
        }
        
        $labour = new Labour;

        for ($colIndex = 1; $colIndex <= $maxColIndex; $colIndex++) {
            $cellValue = $datasheet->getCellByColumnAndRow($colIndex, $rowNum)->getValue();
            
            switch ($colIndex) {
                case 1:
                    $labour->CSDID = $cellValue ?: 0;
                    break;
                case 2:
                    $labour->CSDTxt = $cellValue;
                    break;
                case 3:
                    $labour->Total_Highest_certificate_diploma_or_degree = $cellValue;
                    break;
                case 4:
                    $labour->No_certificate_diploma_or_degree = $cellValue;
                    break;
                case 5:
                    $labour->High_school_diploma = $cellValue;
                    break;
                case 6:
                    $labour->Postsecondary_certificate_or_diploma_below_bachelor = $cellValue ?: 0;
                    break;
                case 7:
                    $labour->Bachelor_degree = $cellValue ?: 0;
                    break;
                case 8:
                    $labour->University_certificate_or_diploma_above_bachelor = $cellValue ?: 0;
                    break;
                case 9:
                    $labour->Total_Population_aged_15_years_and_over_by_labour_force = $cellValue ?: 0;
                    break;
                case 10:
                    $labour->Participation_rate = $cellValue ?: 0;
                    break;
                case 11:
                    $labour->Unemployment_rate = $cellValue ?: 0;
                    break;
                case 12:
                    $labour->Average_weeks_worked_in_reference_year = $cellValue ?: 0;
                    break;
                case 13:
                    $labour->Worked_full_year_full_time = $cellValue;
                    break;
                case 14:
                    $labour->Worked_part_year_and_or_part_time = $cellValue;
                    break;
                case 15:
                    $labour->Total_Labour_force_aged_15_years_and_over_by_occupation = $cellValue;
                    break;
                case 16:
                    $labour->Occupation_not_applicable = $cellValue;
                    break;
                case 17:
                    $labour->All_occupations = $cellValue ?: 0;
                    break;
                case 18:
                    $labour->Legislative_and_senior_management_occupations = $cellValue ?: 0;
                    break;
                case 19:
                    $labour->Business_finance_and_administration_occupations = $cellValue ?: 0;
                    break;
                case 20:
                    $labour->Natural_and_applied_sciences_and_related_occupations = $cellValue ?: 0;
                    break;
                case 21:
                    $labour->Health_occupations = $cellValue ?: 0;
                    break;
                case 22:
                    $labour->Occupations_in_education_law_and_social = $cellValue ?: 0;
                    break;
                case 23:
                    $labour->Occupations_in_art_culture_recreation_and_sport = $cellValue ?: 0;
                    break;
                case 24:
                    $labour->Sales_and_service_occupations = $cellValue ?: 0;
                    break;
                case 25:
                    $labour->Trades_transport_and_equipment_operators = $cellValue ?: 0;
                    break;
                case 26:
                    $labour->Natural_resources_agriculture_and_related = $cellValue ?: 0;
                    break;
                case 27:
                    $labour->Occupations_in_manufacturing_and_utilities = $cellValue ?: 0;
                    break;
                default:
                    break;
            }
        }

        // Skip non-Municipality entries
        if (!str_starts_with($labour->CSDTxt, 'Division No.')) {
            $labour->save();
        }
    }
}
