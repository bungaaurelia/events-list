@extends('layouts.app')

@section('title', 'Add New Organizer')

@section('content')
    <h1>Add New Organizer</h1>
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

    <form action="{{ route('organizers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="organizer_name">Name</label>
            <input type="text" class="form-control" id="organizer_name" name="organizer_name" required>
        </div>
        <div class="form-group">
            <label for="contact_email">Email</label>
            <input type="email" class="form-control" id="contact_email" name="contact_email" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website">
        </div>
        <button type="submit" class="btn btn-primary">Save Organizer</button>
        <a href="{{ route('organizers.index') }}">Cancel</a>
    </form>
@endsection
