@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<h1>Edit Event Type</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('event-types.update', $type->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="event_type_name">Event Type Name:</label>
                <input type="text" class="form-control" name="event_type_name" id="event_type_name" value="{{ old('event_type_name', $type->event_type_name) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Event Type</button>
            <a href="{{ route('types.index') }}">Cancel</a>
        </form>

@endsection