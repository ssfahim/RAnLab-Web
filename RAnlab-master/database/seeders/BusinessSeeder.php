<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Demography;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 1;
        if (($handle = fopen("database/data/businesses.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $this->persistBusinessFromCsv($data, $row);
                $row++;
            }
            fclose($handle);
        }
    }

    private function persistBusinessFromCsv($data, $row)
    {
        if($row === 1)
        {
            return;
        }
        if($row > 1 && $row <= 50)
        {
            $region = 304;
        }
        if($row > 50 && $row <= 52)
        {
            $region = 331;
        }
        if($row > 52 && $row <= 95)
        {
            $region = 208;
        }
        if($row > 95 && $row <= 145)
        {
            $region = 210;
        }
        if($row > 145 && $row <= 147)
        {
            $region = 315;
        }
        if($row > 147 && $row <= 671)
        {
            $region = 188;
        }
        if($row > 671 && $row <= 677)
        {
            $region = 190;
        }
        if($row > 677 && $row <= 843)
        {
            $region = 175;
        }
        if($row > 843 && $row <= 850)
        {
            $region = 330;
        }
        if($row > 850 && $row <= 1321)
        {
            $region = 207;
        }
        if($row > 1321 && $row <= 1327)
        {
            $region = 195;
        }
        if($row > 1327 && $row <= 1331)
        {
            $region = 190;
        }
        if($row > 1331 && $row <= 1669)
        {
            $region = 360;
        }
        if($row > 1669 && $row <= 1674)
        {
            $region = 196;
        }
        if($row > 1674 && $row <= 1681)
        {
            $region = 193;
        }
        if($row > 1681 && $row <= 1689)
        {
            $region = 187;
        }
        if($row > 1689 && $row <= 1690)
        {
            $region = 191;
        }
        if($row > 1690 && $row <= 1694)
        {
            $region = 194;
        }
        if($row > 1694 && $row <= 1699)
        {
            $region = 197;
        }
        if($row > 1699 && $row <= 1703)
        {
            $region = 209;
        }
        if($row > 1703 && $row <= 1716)
        {
            $region = 314;
        }
        if($row > 1716 && $row <= 1829)
        {
            $region = 287;
        }
        if($row > 1829 && $row <= 1967)
        {
            $region = 333;
        }
        if($row > 1967 && $row <= 1975)
        {
            $region = 336;
        }
        if($row > 1975 && $row <= 1986)
        {
            $region = 182;
        }
        if($row > 1986 && $row <= 1990)
        {
            $region = 198;
        }
        if($row > 1990 && $row <= 2230)
        {
            $region = 362;
        }
        if($row > 2230 && $row <= 2354)
        {
            $region = 363;
        }
        if($row > 2354 && $row <= 2371)
        {
            $region = 330;
        }

        $business = new Business;

        $business->last_action = 'Added';
        $business->region = $region;
        $business->year = $data[1];
        $business->name = $data[2];
        $business->industry = $data[3];
        $business->employment = $data[4] === 'N/A' ? 0 : $data[4];
        $business->location = $data[5].', '.$data[6];
        $business->is_master = true;
        $business->is_draft = false;

        $business->saveQuietly();
        $business->master_id = $business->id;
        $business->saveQuietly();
    }
}
