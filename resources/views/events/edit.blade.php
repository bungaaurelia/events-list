@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
        <h1>Edit Event</h1>

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

        <form id="eventForm" action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" name="event_name" id="event_name" value="{{ old('event_name', $event->event_name) }}" required>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" class="form-control" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date) }}" required>
            </div>

            <div class="form-group">
                <label for="event_time">Event Time:</label>
                <input type="time" class="form-control" name="event_time" id="event_time" value="{{ old('event_time', $event->event_time) }}" required>
            </div>

            <div class="form-group">
                <label for="organizer_id">Organizer:</label>
                <select class="form-control" name="organizer_id" id="organizer_id" required>
                    @foreach ($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ old('organizer_id', $event->organizer_id) == $organizer->id ? 'selected' : '' }}>
                            {{ $organizer->organizer_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="event_type_id">Event Type:</label>
                <select class="form-control" name="event_type_id" id="event_type_id" required>
                    @foreach ($eventTypes as $eventType)
                        <option value="{{ $eventType->id }}" {{ old('event_type_id', $event->event_type_id) == $eventType->id ? 'selected' : '' }}>
                            {{ $eventType->event_type_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"class="btn btn-primary">Update Event</button>
            <a href="{{ route('events.index') }}">Cancel</a>
        </form><br>

@endsection