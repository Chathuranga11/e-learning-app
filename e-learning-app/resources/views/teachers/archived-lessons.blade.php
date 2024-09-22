@extends('layouts.teacher')

@section('title', 'Archived Lessons')

@section('content')
    <div class="container mt-4">
        <h2>Archived Lessons</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Lesson Name</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Fee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivedLessons as $lesson)
                <tr>
                    <td>{{ $lesson->lesson_name }}</td>
                    <td>{{ $lesson->lesson_date }}</td>
                    <td>{{ $lesson->lesson_duration }}</td>
                    <td>{{ $lesson->lesson_fee }}</td>
                    <td>
                        <a href="{{ route('teacher.archived.lessons.students', $lesson->id) }}" class="btn btn-primary">View Students</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
