@extends('layouts.teacher')

@section('title', 'Students for Archived Lesson')

@section('content')
    <div class="container mt-4">
        <h2>Students Who Purchased: {{ $lesson->lesson_name }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
