@extends('layouts.student')

@section('title', 'Join Lesson')

@section('content')
    <div class="container mt-4">
        <h2>Joining Lesson: {{ $lesson->lesson_name }}</h2>
        <p>Lesson Date: {{ $lesson->lesson_date }}</p>
        <p>Lesson Duration: {{ $lesson->lesson_duration }}</p>
        <p>Lesson Fee: {{ $lesson->lesson_fee }}</p>

        <p>You have successfully joined this lesson!</p>
    </div>
@endsection
