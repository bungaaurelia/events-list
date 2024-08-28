@extends('layouts.app')

@section('title', 'Event Types')

@section('content')
    <h1 class="mb-4">Event Types</h1>

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

        <!-- Search Form -->
        <div class="row container mt-4">
            <div class="col">
                <a href="{{ route('event-types.create') }}" class="btn btn-primary mb-3">Add New Event Type</a>
            </div>
            <div class="col">
                <div class="text-right mb-3">
                    <form method="GET" action="{{ route('event-types.index') }}" class="form-inline justify-content-end">
                        <div class="form-group mb-2">
                            <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ml-2">Search</button>
                        <!-- Show All Button -->
                        <a href="{{ route('event-types.index') }}" class="btn btn-secondary mb-2 ml-2">Show All</a>
                    </form>
                </div>
            </div>
        </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventTypes as $eventType)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $eventType->event_type_name }}</td>
                    <td>
                        <a href="{{ route('event-types.edit', $eventType->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('event-types.destroy', $eventType->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Event Type?')">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
