<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Car extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    protected $casts = ['images' => 'array'];

    /**
     * @return HasMany
     */
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }

    /**
     * @return HasMany
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class)->where('user_id', Auth::id());
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * @return Attribute
     */
    public function carRating(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value
        );
    }

    /**
     * @return Attribute
     */
    public function hasReviewAttribute(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value
        );
    }
}
