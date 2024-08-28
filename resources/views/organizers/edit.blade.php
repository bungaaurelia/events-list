@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<h1>Edit Organizer</h1>

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

<form action="{{ route('organizers.update', $organizer->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="organizer_name">Organizer Name:</label>
        <input type="text" class="form-control" name="organizer_name" id="organizer_name" value="{{ old('organizer_name', $organizer->organizer_name) }}" required>
    </div>

    <div class="form-group">
        <label for="contact_email">Contact Email:</label>
        <input type="email" class="form-control" name="contact_email" id="contact_email" value="{{ old('contact_email', $organizer->contact_email) }}" required>
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', $organizer->phone_number) }}">
    </div>

    <div class="form-group">
        <label for="website">Website:</label>
        <input type="text" class="form-control" name="website" id="website" value="{{ old('website', $organizer->website) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Organizer</button>
    <a href="{{ route('organizers.index') }}">Cancel</a>
</form>

@endsection