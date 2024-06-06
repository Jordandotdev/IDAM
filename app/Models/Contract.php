<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'agreement',
        'contract_period',
        'contract_price',
        'bid_date',
        'bid_time',
        'bid_duration',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function bid()
    {
        return $this->hasMany(Bid::class);
    }
}
