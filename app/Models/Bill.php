<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'usages_id',
        'month',
        'year',
        'number_of_meters',
        'status',
        'customers_id'
    ];
    
}
