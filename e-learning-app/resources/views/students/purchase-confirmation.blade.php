@extends('layouts.student')

@section('title', 'Purchase Confirmation')

@section('content')
    <div class="container mt-4">
        <h2>Confirm Purchase</h2>
        <p>You are about to purchase the lesson: {{ $lesson->lesson_name }}</p>
        <a href="{{ route('purchase.success', $lesson->id) }}" class="btn btn-success">Success</a>
        <a href="{{ route('purchase.fail') }}" class="btn btn-danger">Fail</a>
    </div>
@endsection
