<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_name',
        'contact_email',
        'phone_number',
        'website',
    ];

    /**
     * Get the events for the organizer.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    // Scope to filter by name
    public function scopeName($query, $name)
    {
        return $query->where('organizer_name', 'LIKE', "%{$name}%");
    }

    // Scope to filter by email
    public function scopeEmail($query, $email)
    {
        return $query->where('contact_email', $email);
    }

    // Scope to filter by a specific status (if applicable)
    // Modify this as needed based on your actual requirements
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
