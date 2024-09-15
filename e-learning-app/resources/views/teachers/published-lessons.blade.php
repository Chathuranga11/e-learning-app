@extends('layouts.teacher')

@section('title', 'Published Lessons')

@section('content')
<div class="container mt-4">
    <h2>Published Lessons</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('lessons.update') }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Lesson Name</th>
                    <th>Lesson Description</th>
                    <th>Lesson Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>
                            <input type="text" name="lesson_name[{{ $lesson->id }}]" value="{{ $lesson->lesson_name }}" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="lesson_description[{{ $lesson->id }}]" value="{{ $lesson->lesson_description }}" class="form-control">
                        </td>
                        <td>{{ $lesson->lesson_date }}</td>
                        <td>
                            <button type="submit" name="lesson_id" value="{{ $lesson->id }}" class="btn btn-primary">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection
