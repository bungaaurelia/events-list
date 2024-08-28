<?php

namespace App\Models;

use App\Scopes\EventStatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name',
        'event_date',
        'event_time',
        'organizer_id',
        'description',
        'event_type_id',
        'status' => 'published'
    ];

    /**
     * Get the organizer that owns the event.
     */
    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

    /**
     * Get the event type associated with the event.
     */
    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    protected static function booted()
    {
        // Apply the scope with 'published' status by default
        static::addGlobalScope(new EventStatusScope('published'));
    }

    // To use it as a local scope instead, remove it from booted method
    public function scopePublished($query)
    {
        return $query->withGlobalScope('published', new EventStatusScope('published'));
    }

    // Add the scope here
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Define the scope for unpublished events
    public function scopeUnpublished($query)
    {
        return $query->where('status', 'unpublished');
    }
}
