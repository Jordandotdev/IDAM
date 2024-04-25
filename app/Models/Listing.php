<?php

namespace App\Models;

use App\Enums\FurnishStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use App\Enums\PropertyType;

class Listing extends Model
{
    use HasFactory;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'title',
        'description',
        'price',
        'property_type',
        'furnishing_status'
    ];

    protected $casts = [
        'property_type' => LocationType::class,
        'furnishing_status' => FurnishStatus::class,
    ];
}
