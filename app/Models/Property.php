<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'location',
        'address',
        'surface',
        'rooms',
        'bathrooms',
        'year_built',
        'property_type',
        'status',
        'energy_rating',
        'co2_emissions',
        'co2_savings',
        'energy_type',
        'sustainability_features',
        'certifications',
        'images',
        'energy_certificate_pdf',
        'is_featured',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sustainability_features' => 'array',
        'certifications' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title);
            }
        });
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'disponible');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByEnergyRating($query, $rating)
    {
        return $query->where('energy_rating', $rating);
    }

    public function scopeByEnergyType($query, $type)
    {
        return $query->where('energy_type', $type);
    }

    public function scopePriceRange($query, $min = null, $max = null)
    {
        if ($min) {
            $query->where('price', '>=', $min);
        }
        if ($max) {
            $query->where('price', '<=', $max);
        }
        return $query;
    }

    public function scopeByRooms($query, $rooms)
    {
        if ($rooms >= 5) {
            return $query->where('rooms', '>=', 5);
        }
        return $query->where('rooms', $rooms);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // Relationships
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . ' €';
    }

    public function getMainImageAttribute()
    {
        return $this->images[0] ?? '/images/placeholder-property.jpg';
    }
}
