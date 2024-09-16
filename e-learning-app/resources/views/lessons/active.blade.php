@extends('layouts.student')

@section('title', 'Active Lessons')

@section('content')
    <div class="container mt-4">
        <h2>Active Lessons</h2>
        <div class="row">
            @foreach($activeLessons as $lesson)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->lesson_name }}</h5>
                            <p class="card-text">{{ $lesson->lesson_description }}</p>
                            <p class="card-text"><strong>Date:</strong> {{ $lesson->lesson_date }}</p>
                            <p class="card-text"><strong>Time:</strong> {{ $lesson->lesson_time }}</p>
                            <p class="card-text"><strong>Duration:</strong> {{ $lesson->lesson_duration }}</p>
                            <p class="card-text"><strong>Fee:</strong> ${{ $lesson->lesson_fee }}</p>
                            <a href="{{ route('lessons.purchase', $lesson->id) }}" class="btn btn-success">Purchase</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
