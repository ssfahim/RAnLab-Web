<?php

namespace Database\Seeders;

use App\Models\FoodPriceStandard;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class FoodPriceStandardSeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 2; // Assuming the first row is the header row

    public function run()
    {
        $datasheet = IOFactory::load('database/data/MayStandard.csv')->getActiveSheet();
        $maxCol = $datasheet->getHighestColumn();
        $maxColIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($maxCol);
        $maxRow = $datasheet->getHighestDataRow();
        
        for ($rowNum = $this->FIRST_DATA_ROW; $rowNum <= $maxRow; $rowNum++) {
            $this->persistDataRowAsDashboard($datasheet, $rowNum, $maxColIndex);
        }
    }

    private function persistDataRowAsDashboard($datasheet, int $rowNum, int $maxColIndex)
    {
        $foodPriceData = [];

        for ($colIndex = 1; $colIndex <= $maxColIndex; $colIndex++) {
            $cellValue = $datasheet->getCellByColumnAndRow($colIndex, $rowNum)->getValue() ?: 0;

            $columnMap = [
                1 => 'Jan-2020',
                2 => 'Feb-2020',
                3 => 'Mar-2020',
                4 => 'Apr-2020',
                5 => 'May-2020',
                6 => 'Jun-2020',
                7 => 'Jul-2020',
                8 => 'Aug-2020',
                9 => 'Sep-2020',
                10 => 'Oct-2020',
                11 => 'Nov-2020',
                12 => 'Dec-2020',
                13 => 'Jan-2021',
                14 => 'Feb-2021',
                15 => 'Mar-2021',
                16 => 'Apr-2021',
                17 => 'May-2021',
                18 => 'Jun-2021',
                19 => 'Jul-2021',
                20 => 'Aug-2021',
                21 => 'Sep-2021',
                22 => 'Oct-2021',
                23 => 'Nov-2021',
                24 => 'Dec-2021',
                25 => 'Jan-2022',
                26 => 'Feb-2022',
                27 => 'Mar-2022',
                28 => 'Apr-2022',
                29 => 'May-2022',
                30 => 'Jun-2022',
                31 => 'Jul-2022',
                32 => 'Aug-2022',
                33 => 'Sep-2022',
                34 => 'Oct-2022',
                35 => 'Nov-2022',
                36 => 'Dec-2022',
                37 => 'Jan-2023',
                38 => 'Feb-2023',
                39 => 'Mar-2023',
                40 => 'Apr-2023',
                41 => 'May-2023',
                42 => 'Jun-2023',
                43 => 'Jul-2023',
                44 => 'Aug-2023',
                45 => 'Sep-2023',
                46 => 'Oct-2023',
                47 => 'Nov-2023',
                48 => 'Dec-2023',
                49 => 'Jan-2024',
                50 => 'Feb-2024',
                51 => 'Mar-2024',
                52 => 'Apr-2024',
                53 => 'May-2024',
            ];

            if (isset($columnMap[$colIndex])) {
                $foodPriceData[$columnMap[$colIndex]] = $cellValue;
            }
        }

        FoodPriceStandard::create($foodPriceData);
    }
}

