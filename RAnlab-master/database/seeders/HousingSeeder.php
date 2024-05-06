<?php

namespace Database\Seeders;

use App\Models\Housing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HousingSeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datasheet = IOFactory::load('database/data/housing.xlsx')->getActiveSheet();
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
        
        $housing = new Housing;

        for ($colIndex = 1; $colIndex <= $maxColIndex; $colIndex++) {
            $cellValue = $datasheet->getCellByColumnAndRow($colIndex, $rowNum)->getValue();
            
            switch ($colIndex) {
                case 1:
                    $housing->CSDID = $cellValue ?: \Illuminate\Support\Str::uuid();
                    break;
                case 2:
                    $housing->CSDTxt = $cellValue;
                    break;
                case 3:
                    $housing->Total_private_dwellings = $cellValue;
                    break;
                case 4:
                    $housing->Private_dwellings_occupied_by_usual_residents = $cellValue;
                    break;
                case 5:
                    $housing->Private_dwellings_not_occupied_by_usual_residents = $cellValue;
                    break;
                case 6:
                    $housing->Average_household_size = $cellValue ?: 0;
                    break;
                case 7:
                    $housing->Owner = $cellValue ?: 0;
                    break;
                case 8:
                    $housing->Renter = $cellValue ?: 0;
                    break;
                case 9:
                    $housing->Total_owner_and_tenant_households_with_household_total_income = $cellValue ?: 0;
                    break;
                case 10:
                    $housing->In_core_need = $cellValue ?: 0;
                    break;
                case 11:
                    $housing->Not_in_core_need = $cellValue ?: 0;
                    break;
                default:
                    break;
            }
        }

        // Skip non-Municipality entries
        if (!str_starts_with($housing->CSDTxt, 'Division No.')) {
            $housing->save();
        }
    }
}
