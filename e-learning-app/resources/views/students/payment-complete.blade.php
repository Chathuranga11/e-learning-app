@extends('layouts.student')

@section('title', 'Payment Complete')

@section('content')
    <div class="container mt-4">
        <h2>Payment Processed</h2>
        <p>Your payment has been processed successfully!</p>
        <a href="{{ route('filter.teacher') }}" class="btn btn-primary">Back to Teachers</a>
    </div>
@endsection
