<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeGender extends Model
{
    use HasFactory;

    protected $table = 'age_gender';

    protected $fillable = [
        'CSDID',
        'GEO',
        'DGUID',
        'Age_groups',
        'Men',
        'Women',
    ];
}
