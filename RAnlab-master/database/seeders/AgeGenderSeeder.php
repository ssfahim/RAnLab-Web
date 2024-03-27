<?php

namespace Database\Seeders;

use App\Models\AgeGender;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AgeGenderSeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 1;

    public function run()
    {
        $datasheet = IOFactory::load('database/data/PopAgeGender.xlsx')->getActiveSheet();
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
        
        $demography = new AgeGender;

        for ($colIndex = 1; $colIndex <= $maxColIndex; $colIndex++) {
            $cellValue = $datasheet->getCellByColumnAndRow($colIndex, $rowNum)->getValue();
            
            switch ($colIndex) {
                case 1:
                    $demography->CSDID = $cellValue ?: \Illuminate\Support\Str::uuid();
                    break;
                case 2:
                    $demography->GEO = $cellValue;
                    break;
                case 3:
                    $demography->DGUID = $cellValue;
                    break;
                case 4:
                    $demography->Age_groups = $cellValue;
                    break;
                case 5:
                    $demography->Men = $cellValue ?: 0;
                    break;
                case 6:
                    $demography->Women = $cellValue ?: 0;
                    break;
                default:
                    break;
            }
        }

        // Skip non-Municipality entries
        if (!str_starts_with($demography->GEO, 'Division No.')) {
            $demography->save();
        }
    }
}




// <?php

// namespace Database\Seeders;

// use App\Models\Dashboard;
// use Illuminate\Database\Seeder;
// use PhpOffice\PhpSpreadsheet\IOFactory;

// class DashboardSeeder extends Seeder
// {
//     private int $FIRST_DATA_ROW = 4;

//     public function run()
//     {
//         $datasheet = IOFactory::load('database/data/dashboard.xlsx')->getActiveSheet();
//         $maxRow = $datasheet->getHighestDataRow();
//         $rowNum = $this->FIRST_DATA_ROW;

//         while ($rowNum <= $maxRow) {
//             $this->persistDataRowAsDashboard($datasheet, $rowNum);
//             $rowNum++;
//         }
//     }

//     private function persistDataRowAsDashboard($datasheet, int $rowNum)
//     {

//         if ($rowNum === $this->FIRST_DATA_ROW) {
//             return;
//         }
//         $demography = new Dashboard;


//         $maxCol = $datasheet->getHighestColumn();

//         for ($col = 'A'; $col <= $maxCol; $col++) {
//             $cell = $datasheet->getCell($col . $rowNum)->getValue();
//             $value = $cell;

//             switch ($col) {
//                 case 'A':
//                     $demography->CSDID = $value ?: \Illuminate\Support\Str::uuid();
//                     break;
//                 case 'B':
//                     $demography->CSDTxt = $value;
//                     break;
//                 case 'C':
//                     $demography->Population_percentage_change_2016_to_2021 = $value;
//                     break;
//                 case 'D':
//                     $demography->Population_2016 = $value;
//                     break;
//                 case 'E':
//                     $demography->Population_2021 = $value;
//                     break;
//                 case 'F':
//                     $demography->Private_dwellings_occupied_by_usual_residents = $value;
//                     break;
//                 case 'G':
//                     $demography->Private_dwellings_not_occupied_by_usual_residents = $value;
//                     break;
//                 case 'H':
//                     $demography->Total_private_dwellings = $value;
//                     break;
//                 case 'I':
//                     $demography->Age_distribution_0_to_14 = $value;
//                     break;
//                 case 'J':
//                     $demography->Age_distribution_15_to_64 = $value;
//                     break;
//                 case 'K':
//                     $demography->Age_distribution_65_years_and_over = $value;
//                     break;
//                 default:
//                     break;
//             }
//         }

//         // Skip non-Municipality entries
//         if (!str_starts_with($demography->CSDTxt, 'Division No.')) {
//             $demography->save();
//         }
//     }
// }
