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
                            <p>{{ $lesson->lesson_description }}</p>
                            <p>Date: {{ $lesson->lesson_date }}</p>
                            <p>Duration: {{ $lesson->lesson_duration }}</p>
                            <p>Fee (Rs.): {{ $lesson->lesson_fee }}</p>
                            <a href="{{ route('lesson.purchase.confirmation', $lesson->lesson_id) }}" class="btn btn-primary">Purchase</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
