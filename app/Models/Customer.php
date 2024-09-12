<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Rate;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'kwh_number',
        'customer_name',
        'address',
        'rates_id'
    ];
    
    public function rates()
    {
        return $this->belongsTo(rates::class);
    }
}
