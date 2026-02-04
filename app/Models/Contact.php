<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'property_id',
        'status',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Methods
    public function markAsRead()
    {
        $this->update([
            'read_at' => now(),
            'status' => 'read',
        ]);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return trim($this->name . ' ' . $this->last_name);
    }
}
