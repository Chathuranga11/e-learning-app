@extends('layouts.student')

@section('title', 'Active Lessons')

@section('content')
    <div class="container mt-4">
        <h2>My Active Lessons</h2>
        @foreach($activeLessons as $purchase)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $purchase->lesson->lesson_name }}</h5>
                    <p class="card-text">{{ $purchase->lesson->lesson_description }}</p>
                    <p><strong>Date:</strong> {{ $purchase->lesson->lesson_date }}</p>
                    <p><strong>Duration:</strong> {{ $purchase->lesson->lesson_duration }}</p>
                    <p><strong>Fee:</strong> ${{ $purchase->lesson->lesson_fee }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
