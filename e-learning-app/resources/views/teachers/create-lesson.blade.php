@extends('layouts.teacher') <!-- Adjust this if you have a different layout -->

@section('title', 'Publish a New Class')

@section('content')
<div class="container mt-4">
    <h2>Publish a New Class</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="lesson_name" class="form-label">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" required>
        </div>
        <div class="mb-3">
            <label for="lesson_description" class="form-label">Lesson Description</label>
            <textarea class="form-control" id="lesson_description" name="lesson_description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="lesson_date" class="form-label">Lesson Date</label>
            <input type="date" class="form-control" id="lesson_date" name="lesson_date" required>
        </div>
        <div class="mb-3">
            <label for="lesson_duration" class="form-label">Lesson Duration</label>
            <input type="text" class="form-control" id="lesson_duration" name="lesson_duration" required>
        </div>
        <div class="mb-3">
            <label for="lesson_fee" class="form-label">Lesson Fee</label>
            <input type="number" class="form-control" id="lesson_fee" name="lesson_fee" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Publish Lesson</button>
    </form>
</div>
@endsection
