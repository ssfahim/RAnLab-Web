<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPrice extends Model
{
    use HasFactory;

    protected $table = 'food_price_table'; // Ensure this matches your database table name

    protected $fillable = [
        "Jan-2020","Feb-2020","Mar-2020","Apr-2020","May-2020","Jun-2020","Jul-2020","Aug-2020","Sep-2020","Oct-2020","Nov-2020","Dec-2020",
        "Jan-2021","Feb-2021","Mar-2021","Apr-2021","May-2021","Jun-2021","Jul-2021","Aug-2021","Sep-2021","Oct-2021","Nov-2021","Dec-2021",
        "Jan-2022","Feb-2022","Mar-2022","Apr-2022","May-2022","Jun-2022","Jul-2022","Aug-2022","Sep-2022","Oct-2022","Nov-2022","Dec-2022",
        "Jan-2023","Feb-2023","Mar-2023","Apr-2023","May-2023","Jun-2023","Jul-2023","Aug-2023","Sep-2023","Oct-2023","Nov-2023","Dec-2023",
        "Jan-2024","Feb-2024","Mar-2024","Apr-2024","May-2024",
    ];
}

