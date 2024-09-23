@extends('layouts.teacher')

@section('title', 'Tutory Time Table')

@section('content')
<div class="container mt-4">
    <h2>Tutory Time Table</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Teacher Name</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($futureLessons as $teacher)
                <tr>
                    <td>{{ $teacher->teacher->first_name }} {{ $teacher->teacher->last_name }}</td>
                    <td>{{ $teacher->lesson_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('d M, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No upcoming lessons found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection