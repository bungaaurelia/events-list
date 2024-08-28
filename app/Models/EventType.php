<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_type_name',
    ];

    /**
     * Get the events for the event type.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
    // Scope to filter by name
    public function scopeName($query, $name)
    {
        return $query->where('event_type_name', 'LIKE', "%{$name}%");
    }
}
