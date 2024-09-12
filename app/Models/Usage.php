<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'year',
        'initial_meter',
        'final_meter',
        'customer_id'
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
