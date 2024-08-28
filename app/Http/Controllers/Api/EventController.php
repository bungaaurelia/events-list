<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $events = Event::all();
            return response()->json($events, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  StoreEventRequest  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'event_name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            Event::create($request->all());
            $response = [
                'Success' => 'New Event Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified event.
     *
     * @param  Event  $event
     * @return JsonResponse
     */
    public function show($events)
    {
        try {
            $events = Event::findOrFail($events);
            $response = [
                $events
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Update the specified event in storage.
     *
     * @param  UpdateEventRequest  $request
     * @param  Event  $event
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Event::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'event_name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $category->update($request->all());
            $response = [
                'Success' => 'Event Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'no result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  Event  $event
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            Event::findOrFail($id)->delete();
            return response()->json(['success' => 'Event deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
