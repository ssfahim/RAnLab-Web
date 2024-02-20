<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_action',
        'region',
        'year',
        'industry',
        'name',
        'employment',
        'location',
        'latitude',
        'longitude',
        'is_master',
        'master_id',
        'is_draft',
        'created_by_id',
        'updated_by_id',
    ];

    public static function queryWithRegionName(): Builder
    {
        return Business::selectRaw('businesses.*, demographies.geog_text as geog_text')
            ->join('demographies', 'businesses.region', '=', 'demographies.id');
    }
}
