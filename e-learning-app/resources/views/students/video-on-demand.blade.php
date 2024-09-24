@extends('layouts.student')

@section('title', 'Video On Demand')

@section('content')
<div class="container mt-4">
    <h2>Video On Demand - Available Lessons</h2>

    <div class="row">
        @forelse($futureLessons as $lesson)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $lesson->lesson_name }}</h5>
                        <p class="card-text">{{ $lesson->lesson_description }}</p>
                        <p><strong>Date:</strong> {{ $lesson->lesson_date }}</p>
                        <p><strong>Duration:</strong> {{ $lesson->lesson_duration }}</p>
                        <p><strong>Fee:</strong> {{ $lesson->lesson_fee }}</p>
                        <a href="{{ route('lesson.watch', $lesson->id) }}" class="btn btn-primary">Watch Video</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No future lessons available at this time.</p>
        @endforelse
    </div>
</div>
@endsection
