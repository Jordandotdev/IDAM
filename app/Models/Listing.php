<?php

namespace App\Models;

use App\Enums\FurnishStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use App\Enums\PropertyType;
use Illuminate\Support\Str;

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
        'developer',
        'property_type',
        'bedrooms',
        'bathrooms',
        'floor_area',
        'floors',
        'land_area',
        'availability',
        'car_parking_spaces',
        'furnishing_status',
        'age_of_building',
        'width_of_approach_road'
    ];

    protected $casts = [
        'property_type' => PropertyType::class,
        'furnishing_status' => FurnishStatus::class,
    ];

    public function getDescriptionExcerpt() // This is an accessor method that returns the excerpt of the post.
    {
        return Str::limit(strip_tags($this->description), 100);
    }

    public function getTitleExcerpt() // This is an accessor method that returns the excerpt of the post.
    {
        return Str::limit(strip_tags($this->title), 10);
    }
}
