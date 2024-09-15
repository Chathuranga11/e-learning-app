@extends('layouts.student')

@section('title', 'Payment')

@section('content')
    <div class="container mt-4">
        <h2>Payment for {{ $lesson->name }}</h2>
        <form action="{{ route('lesson.processPayment', $lesson->id) }}" method="POST">
            @csrf
            <p>Lesson Fee: ${{ $lesson->fee }}</p>
            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    </div>
@endsection
