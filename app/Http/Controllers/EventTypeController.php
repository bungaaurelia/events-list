<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EventTypeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');

        $eventTypes = EventType::query()
            ->name($name) // Apply the name scope if there's a filter
            ->get();

        return view('event-types.index', compact('eventTypes'));
    }

    public function create()
    {
        return view('event-types.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'event_type_name' => 'required|string|max:255|unique:event_types,event_type_name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $eventType = EventType::create($request->all());
            Log::info('Event type created successfully.', ['event_type_id' => $eventType->id]);
            return redirect()->route('event-types.index')->with('success', 'Event type created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create event type: ' . $e->getMessage());
            return redirect()->route('event-types.index')->withErrors('Could not create event type.');
        }
    }

    public function edit(EventType $type)
    {
        return view('event-types.edit', compact('type'));
    }
    
    public function update(Request $request, $type)
    {
        try {
            $eventType = EventType::findOrFail($type);
            $eventType->event_type_name = $request->input('event_type_name');
            $eventType->save();
            Log::info('Event type updated successfully.', ['event_type_id' => $eventType->id]);
            return redirect()->route('event-types.index')->with('success', 'Event type updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update event type: ' . $e->getMessage());
            return redirect()->route('event-types.index')->withErrors('Could not update event type.');
        }
    }

    public function destroy(EventType $type)
    {
        try {
            $type->delete();
            Log::info('Event type deleted successfully.', ['event_type_id' => $type]);
            return redirect()->route('event-types.index')->with('success', 'Event type deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete event type: ' . $e->getMessage());
            return redirect()->route('event-types.index')->withErrors('Could not delete event type.');
        }
    }
}
