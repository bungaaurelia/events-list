@extends('layouts.app')

@section('title', 'Add New Event Type')

@section('content')
    <h1>Add New Event Type</h1>
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
    <form action="{{ route('event-types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="event_type_name">Event Type Name</label>
            <input type="text" class="form-control" id="event_type_name" name="event_type_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Event Type</button>
        <a href="{{ route('types.index') }}">Cancel</a>
    </form>
@endsection
    