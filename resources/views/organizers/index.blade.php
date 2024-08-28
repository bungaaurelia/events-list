@extends('layouts.app')

@section('title', 'Organizers')

@section('content')
    <h1 class="mb-4">Organizers</h1>

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
            <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-3">Add New Organizer</a>
            </div>
            <div class="col">
                <div class="text-right mb-3">
                    <form method="GET" action="{{ route('organizers.index') }}" class="form-inline justify-content-end">
                        <div class="form-group mb-2">
                            <input type="text" name="name" class="form-control" placeholder="Search by name" value="{{ request('name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ml-2">Search</button>
                        <!-- Show All Button -->
                        <a href="{{ route('organizers.index') }}" class="btn btn-secondary mb-2 ml-2">Show All</a>
                    </form>
                </div>
            </div>
        </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizers as $organizer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organizer->organizer_name }}</td>
                    <td>{{ $organizer->contact_email }}</td>
                    <td>{{ $organizer->phone_number }}</td>
                    <td width="200">{{ $organizer->website }}</td>
                    <td width="160">
                        <a href="{{ route('organizers.show', $organizer->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this organizer?')">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
