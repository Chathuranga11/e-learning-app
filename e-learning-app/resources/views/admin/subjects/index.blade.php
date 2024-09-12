@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Subjects</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Subject Button -->
    <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-3">Add New Subject</a>

    <!-- List of Subjects -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
