@extends('layouts.app')

@section('title', 'Add New Event')

@section('content')
    <h1>Add New Event</h1>
    <!-- Display Success or Error Message -->
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>
        <div class="form-group">
            <label for="event_date">Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
        </div>
        <div class="form-group">
            <label for="event_time">Time</label>
            <input type="time" class="form-control" id="event_time" name="event_time" required>
        </div>
        <div class="form-group">
            <label for="organizer_id">Organizer</label>
            <select class="form-control" id="organizer_id" name="organizer_id" required>
                @foreach ($organizers as $organizer)
                    <option value="{{ $organizer->id }}">{{ $organizer->organizer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="event_type_id">Event Type</label>
            <select class="form-control" id="event_type_id" name="event_type_id" required>
                @foreach ($eventTypes as $eventType)
                    <option value="{{ $eventType->id }}">{{ $eventType->event_type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Event</button>
        <a href="{{ route('events.index') }}">Cancel</a>
    </form>
@endsection
