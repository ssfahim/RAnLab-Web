<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingReview extends Model
{
    use HasFactory;
    protected $table = 'housing_review';
    protected $fillable = [
        'CSDID',
        'CSDTxt',
        'year',
        'number_Of_bedrooms',
        'house_structure',
        'location',
    ];
}
