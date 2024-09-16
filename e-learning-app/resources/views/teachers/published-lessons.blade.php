@extends('layouts.teacher')

@section('title', 'Published Lessons')

@section('content')
    <div class="container mt-4">
        <h2>Published Lessons</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Lesson Name</th>
                    <th>Lesson Description</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <form action="{{ route('teachers.update_lesson', $lesson->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <input type="text" class="form-control" name="lesson_name" value="{{ $lesson->lesson_name }}" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="lesson_description" value="{{ $lesson->lesson_description }}" required>
                            </td>
                            <td>{{ $lesson->lesson_date }}</td>
                            <td>{{ $lesson->lesson_duration }}</td>
                            <td>{{ $lesson->lesson_fee }}</td>
                            <td>
                                <!-- Button to update lesson -->
                                <button type="submit" class="btn btn-success">Update</button>
                                <!-- Button to view list of students who purchased this lesson -->
                                <a href="{{ route('teachers.purchased_students', $lesson->id) }}" class="btn btn-primary">View Students</a>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
