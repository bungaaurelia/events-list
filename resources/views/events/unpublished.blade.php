@extends('layouts.app')

@section('title', 'Events')

@section('content')
<style>
/* Loader CSS */
#loader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

#loader p {
    font-size: 20px;
    font-weight: bold;
}

</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>Unpublished Events</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <!-- Search Form -->
    <div class="row container mt-4">
                <div class="col">
                <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Add New Event</a>
                </div>
                <div class="col">
                    <div class="text-right mb-3">
                        <form method="GET" action="{{ route('events.unpublished') }}" class="form-inline justify-content-end">
                            <div class="form-group mb-2">
                                <input type="text" name="event_name" class="form-control" placeholder="Search by event name" value="{{ request('event_name') }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 ml-2">Search</button>
                            <a href="{{ route('events.unpublished') }}" class="btn btn-secondary mb-2 ml-2">Show All</a>
                        </form>
                    </div>
                </div>
            </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Your App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary btn-custom" href="{{ route('events.index') }}">All Events</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="btn btn-secondary btn-custom" href="{{ route('events.unpublished') }}">Unpublished Events</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Loader HTML -->
    <div id="loader" style="display: none;">
        <p>Loading...</p> <!-- Or use a more sophisticated loader graphic -->
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Organizer</th>
                <th>Type</th>
                <th>Descripstion</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($unpublishedEvents as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>{{ $event->event_time }}</td>
                    <td>{{ $event->organizer->organizer_name }}</td>
                    <td>{{ $event->eventType->event_type_name }}</td>
                    <td>{{ $event->description }}</td>
                    <td><input type="checkbox" class="status-toggle" data-id="{{ $event->id }}" {{ $event->status === 'published' ? 'checked' : '' }}></td>
                    <td width="160">
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Del</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No unpublished events found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <script src="{{ asset('js/javascript.js') }}"></script>
    @endsection