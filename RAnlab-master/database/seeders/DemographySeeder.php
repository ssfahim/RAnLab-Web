<?php

namespace Database\Seeders;

use App\Models\Demography;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DemographySeeder extends Seeder
{
    private int $FIRST_DATA_ROW = 3;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datasheet = IOFactory::load('database/data/demography.xlsx')->getActiveSheet();
        $maxRow = $datasheet->getHighestDataRow();
        $rowNum = $this->FIRST_DATA_ROW;

        while($rowNum <= $maxRow)
        {
            $this->persistDataRowAsDemography($datasheet, $rowNum);
            $rowNum++;
        }

        // Remove non-Municipality entires for demo
        Demography::where('geog_text', 'like', 'Division No%')->delete();
    }

    private function persistDataRowAsDemography(Worksheet $datasheet, int $rowNum)
    {
        $demography = new Demography;

        $maxCol = $datasheet->getHighestColumn();
        $colIterator = $datasheet->getColumnIterator()->resetStart();

        while($colIterator->key() != $maxCol)
        {
            $cell = $datasheet->getCell($colIterator->key().$rowNum);

            switch ($colIterator->key())
            {
                case 'A':
                    $demography->geog_text = $cell->getValue();
                    break;
                case 'B':
                    $demography->geog_number = $cell->getValue();
                    break;
                case 'C':
                    $demography->geog_text_raw = $cell->getValue();
                    break;
                case 'D':
                    $demography->population_total = $cell->getCalculatedValue();
                    break;
                case 'E':
                    $demography->population_0_4 = $cell->getValue();
                    break;
                case 'F':
                    $demography->population_5_9 = $cell->getValue();
                    break;
                case 'G':
                    $demography->population_10_14 = $cell->getValue();
                    break;
                case 'H':
                    $demography->population_15_19 = $cell->getValue();
                    break;
                case 'I':
                    $demography->population_20_24 = $cell->getValue();
                    break;
                case 'J':
                    $demography->population_25_29 = $cell->getValue();
                    break;
                case 'K':
                    $demography->population_30_34 = $cell->getValue();
                    break;
                case 'L':
                    $demography->population_35_39 = $cell->getValue();
                    break;
                case 'M':
                    $demography->population_40_44 = $cell->getValue();
                    break;
                case 'N':
                    $demography->population_45_49 = $cell->getValue();
                    break;
                case 'O':
                    $demography->population_50_54 = $cell->getValue();
                    break;
                case 'P':
                    $demography->population_55_59 = $cell->getValue();
                    break;
                case 'Q':
                    $demography->population_60_64 = $cell->getValue();
                    break;
                case 'R':
                    $demography->population_65_69 = $cell->getValue();
                    break;
                case 'S':
                    $demography->population_70_74 = $cell->getValue();
                    break;
                case 'T':
                    $demography->population_75_79 = $cell->getValue();
                    break;
                case 'U':
                    $demography->population_80_84 = $cell->getValue();
                    break;
                case 'V':
                    $demography->population_85_89 = $cell->getValue();
                    break;
                case 'W':
                    $demography->population_90_94 = $cell->getValue();
                    break;
                case 'X':
                    $demography->population_95_99 = $cell->getValue();
                    break;
                case 'Y':
                    $demography->population_100_up = $cell->getValue();
                    break;
                case 'Z':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->population_change_0_14 = $scrubbedValue;
                    break;
                case 'AA':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->population_change_15_64 = $scrubbedValue;
                    break;
                case 'AB':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->population_change_65_up = $scrubbedValue;
                    break;
                case 'AC':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->percent_change_0_14 = $scrubbedValue;
                    break;
                case 'AD':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->percent_change_15_64 = $scrubbedValue;
                    break;
                case 'AE':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->percent_change_65_up = $scrubbedValue;
                    break;
                case 'AF':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->dependency_ratio_youth = $scrubbedValue;
                    break;
                case 'AG':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->dependency_ratio_senior = $scrubbedValue;
                    break;
                case 'AH':
                    $scrubbedValue = $cell->getValue() === 'N/A' ? null : $cell->getValue();
                    $demography->dependency_ratio_combined = $scrubbedValue;
                    break;
                default:
                    break;
            }

            $colIterator->next();
        }

        // Hack for last column becasue 'AI' < 'B'
        $scrubbedValue = $datasheet->getCell($colIterator->key().$rowNum)->getValue() === 'N/A' ? null : $datasheet->getCell($colIterator->key().$rowNum)->getValue();
        $demography->seniors_housing = $scrubbedValue;
        $demography->save();
    }
}
