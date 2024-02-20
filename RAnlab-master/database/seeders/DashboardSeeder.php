<?php

namespace Database\Seeders;

use App\Models\Dashboard;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DashboardSeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 4;

    public function run()
    {
        $datasheet = IOFactory::load('database/data/dashboard.xlsx')->getActiveSheet();
        $maxRow = $datasheet->getHighestDataRow();
        $rowNum = $this->FIRST_DATA_ROW;

        while ($rowNum <= $maxRow) {
            $this->persistDataRowAsDashboard($datasheet, $rowNum);
            $rowNum++;
        }
    }

    private function persistDataRowAsDashboard($datasheet, int $rowNum)
    {

        if ($rowNum === $this->FIRST_DATA_ROW) {
            return;
        }
        $demography = new Dashboard;

        $maxCol = $datasheet->getHighestColumn();

        for ($col = 'A'; $col <= $maxCol; $col++) {
            $cell = $datasheet->getCell($col . $rowNum);
            $value = $cell->getValue();

            switch ($col) {
                case 'A':
                    $demography->CSDID = $value;
                    break;
                case 'B':
                    $demography->CSDTxt = $value;
                    break;
                case 'C':
                    $demography->Population_percentage_change_2016_to_2021 = $value;
                    break;
                case 'D':
                    $demography->Population_2016 = $value;
                    break;
                case 'E':
                    $demography->Population_2021 = $value;
                    break;
                default:
                    break;
            }
        }

        // Skip non-Municipality entries
        if (!str_starts_with($demography->CSDTxt, 'Division No.')) {
            $demography->save();
        }
    }
}
