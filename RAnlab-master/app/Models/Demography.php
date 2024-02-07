<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demography extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'geog_text',
        'geog_number',
        'geog_text_raw',
        'population_total',
        'population_0_4',
        'population_5_9',
        'population_10_14',
        'population_15_19',
        'population_20_24',
        'population_25_29',
        'population_30_34',
        'population_35_39',
        'population_40_44',
        'population_45_49',
        'population_50_54',
        'population_55_59',
        'population_60_64',
        'population_65_69',
        'population_70_74',
        'population_75_79',
        'population_80_84',
        'population_85_89',
        'population_90_94',
        'population_95_99',
        'population_100_up',
        'population_change_0_14',
        'population_change_15_64',
        'population_change_65_up',
        'percent_change_0_14',
        'percent_change_15_64',
        'percent_change_65_up',
        'dependency_ratio_youth',
        'dependency_ratio_senior',
        'dependency_ratio_combined',
        'seniors_housing',
    ];
}
