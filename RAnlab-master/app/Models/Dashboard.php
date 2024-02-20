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
    ];

    // You can define relationships or other custom functionality here
}
