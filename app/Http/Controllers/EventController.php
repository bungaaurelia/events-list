<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\EventType;
use App\Scopes\EventStatusScope;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Apply search filter
        if ($request->has('event_name') && !empty($request->input('event_name'))) {
            $query->where('event_name', 'like', '%' . $request->input('event_name') . '%');
        }

        // Fetch events with pagination (if needed)
        $publishedEvents = $query->with(['organizer', 'eventType'])->paginate(10);

        return view('events.index', compact('publishedEvents'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->status = $request->input('status');
            $event->save();

            Log::info('Event status updated successfully.');

            // Determine the redirect URL based on the new status
            if ($request->input('status') === 'published') {
                return response()->json(['redirect' => route('events.index')]); // Redirect to the published events list
            } else if ($request->input('status') === 'unpublished') {
                return response()->json(['redirect' => route('events.unpublished')]); // Redirect to the unpublished events list
            } else {
                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to update event status: ' . $e->getMessage());
            return response()->json(['error' => 'Could not update event status.'], 500);
        }
    }

    public function showUnpublished(Request $request)
    {
        try {
            // Start the query for unpublished events
            $query = Event::withoutGlobalScope(EventStatusScope::class)
                          ->unpublished()
                          ->with(['organizer', 'eventType']);
    
            // Apply search filter if a search term is present
            if ($request->has('event_name') && !empty($request->input('event_name'))) {
                $query->where('event_name', 'like', '%' . $request->input('event_name') . '%');
            }
    
            // Execute the query
            $unpublishedEvents = $query->get();
    
            Log::info('Fetched unpublished events successfully.');
            return view('events.unpublished', compact('unpublishedEvents'))
                   ->with('success', 'Event updated successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to fetch unpublished events: ' . $e->getMessage());
            return view('events.unpublished')->withErrors('Could not retrieve unpublished events.');
        }
    }
    
    public function show($id)
    {
        $events = Event::with(['organizer', 'eventType'])->findOrFail($id);
        return view('events.show', compact('events'));
    }

    public function create()
    {
        $organizers = Organizer::all();
        $eventTypes = EventType::all();

        return view('events.create', compact('organizers', 'eventTypes'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'organizer_id' => 'required|exists:organizers,id',
            'event_type_id' => 'required|exists:event_types,id',
        ]);

        try {
            $event = Event::create($request->all());
            Log::info('Event created successfully.', ['event_id' => $event->id]);
            return redirect()->route('events.index')->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create event: ' . $e->getMessage());
            return redirect()->route('events.index')->withErrors('Could not create event.');
        }
    }
    
    public function edit($id)
    {
        $organizers = Organizer::all();
        $eventTypes = EventType::all();

        $event = Event::with(['organizer', 'eventType'])->findOrFail($id);
        return view('events.edit', compact('event', 'organizers', 'eventTypes'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i:s',
            'organizer_id' => 'required|exists:organizers,id',
            'description' => 'nullable|string',
            'event_type_id' => 'required|exists:event_types,id',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Reformat the time before saving
        $formattedTime = Carbon::createFromFormat('H:i:s', $request->input('event_time'))->format('H:i');
        $data['status'] = $data['status'] ?? 'published';
        // Find the event by ID and update it
        $event = Event::findOrFail($id);
        $event->update([
            'event_name' => $request->input('event_name'),
            'event_date' => $request->input('event_date'), // Assuming date is already in correct format
            'event_time' => $formattedTime, // Save the formatted time
            'organizer_id' => $request->input('organizer_id'),
            'description' => $request->input('description'),
            'event_type_id' => $request->input('event_type_id'),
        ]);


        // Redirect to a specific view with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $id)
    {
        try {
            $id->delete();
            Log::info('Event deleted successfully.', ['id' => $id]);
            return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete event type: ' . $e->getMessage());
            return redirect()->route('events.index')->withErrors('Could not delete event.');
        }
    }
}
