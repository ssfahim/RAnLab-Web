<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingReviewRequest extends Model
{
    use HasFactory;
    protected $table = 'housing_review_request';
    protected $fillable = [
        'CSDID',
        'CSDTxt',
        'year',
        'number_Of_bedrooms',
        'house_structure',
        'location',
    ];
}
