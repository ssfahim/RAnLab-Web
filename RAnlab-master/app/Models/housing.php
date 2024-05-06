<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    use HasFactory;

    protected $table = 'housing';

    protected $fillable = [
        'CSDID',
        'CSDTxt',
        'Total_private_dwellings',
        'Private_dwellings_occupied_by_usual_residents',
        'Private_dwellings_not_occupied_by_usual_residents',
        'Average_household_size',
        'Owner',
        'Renter',
        'Total_owner_and_tenant_households_with_household_total_income',
        'In_core_need',
        'Not_in_core_need',
    ];
}
