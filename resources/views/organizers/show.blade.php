@extends('layouts.app')

@section('title', $organizer->organizer_name)

@section('content')
    <h1>{{ $organizer->organizer_name }}</h1>
    <p><strong>Email:</strong> {{ $organizer->contact_email }}</p>
    <p><strong>Phone:</strong> {{ $organizer->phone_number }}</p>
    <p><strong>Website:</strong> <a href="{{ $organizer->website }}">{{ $organizer->website }}</a></p>
    
    <a href="{{ route('organizers.index') }}" class="btn btn-secondary">Back to Organizers</a>
@endsection
