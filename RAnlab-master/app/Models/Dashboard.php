<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $table = 'dashboard';

    protected $fillable = [
        'CSDID',
        'CSDTxt',
        'Population_percentage_change_2016_to_2021',
        'Population_2016',
        'Population_2021',
        'Private_dwellings_occupied_by_usual_residents',
        'Private_dwellings_not_occupied_by_usual_residents',
        'Total_private_dwellings',
        'Age_distribution_0_to_14',
        'Age_distribution_15_to_64',
        'Age_distribution_65_years_and_over',
    ];

    // You can define relationships or other custom functionality here
}
