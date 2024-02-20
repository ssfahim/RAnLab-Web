<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class DashboardImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        return $rows->reject(function ($row) {
            return strpos($row['CSDTxt'], 'Division') !== false;
        });
    }
}
