@extends('layouts.student')

@section('title', 'Teacher Lessons')

@section('content')
    <div class="container mt-4">
        <h2>Lessons by {{ $teacher->first_name }} {{ $teacher->last_name }}</h2>
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lesson->name }}</h5>
                            <p class="card-text">{{ $lesson->description }}</p>
                            <p>Date: {{ $lesson->date }}</p>
                            <p>Time: {{ $lesson->time }}</p>
                            <p>Duration: {{ $lesson->duration }} hours</p>
                            <p>Fee: ${{ $lesson->fee }}</p>
                            <a href="{{ route('lesson.pay', $lesson->id) }}" class="btn btn-success">Pay</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
