@extends('layouts.app')

@section('title', $events->event_name)

@section('content')
    <h1>{{ $events->event_name }}</h1>
    <p><strong>Date:</strong> {{ $events->event_date }}</p>
    <p><strong>Time:</strong> {{ $events->event_time }}</p>
    <p><strong>Description:</strong> {{ $events->description }}</p>
    <p><strong>Organizer:</strong> {{ $events->organizer->organizer_name }} ({{ $events->organizer->contact_email }})</p>
    <p><strong>Type:</strong> {{ $events->eventType->event_type_name }}</p>
    
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
@endsection
