<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labour extends Model
{
    use HasFactory;

    protected $table = 'labour';

    protected $fillable = [
        'CSDID',
        'CSDTxt',
        'Total_Highest_certificate_diploma_or_degree',
        'No_certificate_diploma_or_degree',
        'High_school_diploma',
        'Postsecondary_certificate_or_diploma_below_bachelor',
        'Bachelor_degree',
        'University_certificate_or_diploma_above_bachelor',
        'Total_Population_aged_15_years_and_over_by_labour_force',
        'Participation_rate',
        'Unemployment_rate',
        'Average_weeks_worked_in_reference_year',
        'Worked_full_year_full_time',
        'Worked_part_year_and_or_part_time',
        'Total_Labour_force_aged_15_years_and_over_by_occupation',
        'Occupation_not_applicable',
        'All_occupations',
        'Legislative_and_senior_management_occupations',
        'Business_finance_and_administration_occupations',
        'Natural_and_applied_sciences_and_related_occupations',
        'Health_occupations',
        'Occupations_in_education_law_and_social',
        'Occupations_in_art_culture_recreation_and_sport',
        'Sales_and_service_occupations',
        'Trades_transport_and_equipment_operators',
        'Natural_resources_agriculture_and_related',
        'Occupations_in_manufacturing_and_utilities',
    ];
}
