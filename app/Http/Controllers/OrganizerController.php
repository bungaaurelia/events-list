<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class OrganizerController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $organizers = Organizer::query()
            ->when($name, function ($query, $name) {
                return $query->name($name);
            })
            ->when($email, function ($query, $email) {
                return $query->email($email);
            })
            ->get();

        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'organizer_name' => 'required|string|max:255',
            'contact_email' => 'required|email|unique:organizers,contact_email',
            'phone_number' => 'nullable|string|max:15',
            'website' => 'nullable|url|max:255',
        ]);

        try {
            $organizer = Organizer::create($request->all());
            Log::info('Organizer created successfully.', ['organizer_id' => $organizer->id]);
            return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create organizer: ' . $e->getMessage());
            return redirect()->route('organizers.index')->withErrors('Could not create organizer.');
        }
    }

    public function show(Organizer $organizer)
    {
        return view('organizers.show', compact('organizer'));
    }

    public function edit(Organizer $organizer)
    {
        return view('organizers.edit', compact('organizer'));
    }

    public function update(Request $request, $organizer)
    {
        // Validate the input data
        $request->validate([
            'organizer_name' => 'required|string|max:255',
            'contact_email' => 'required|email|unique:organizers,contact_email,' . $organizer,
            'phone_number' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
        ]);

        try {
            $organizer = Organizer::findOrFail($organizer);

             // Update the organizer's details
            $organizer->organizer_name = $request->input('organizer_name');
            $organizer->contact_email = $request->input('contact_email');
            $organizer->phone_number = $request->input('phone_number');
            $organizer->website = $request->input('website');

            // Save the changes to the database
            $organizer->save();

            Log::info('Organizer updated successfully.', ['organizer_id' => $organizer->id]);
            return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update organizer: ' . $e->getMessage());
            return redirect()->route('organizers.index')->withErrors('Could not update organizer.');
        }
    }

    public function destroy(Organizer $organizer)
    {
        try {
            $organizer->delete();
            Log::info('Organizer deleted successfully.', ['organizer_id' => $organizer]);
            return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete organizer: ' . $e->getMessage());
            return redirect()->route('organizers.index')->withErrors('Could not delete organizer.');
        }
    }
}
