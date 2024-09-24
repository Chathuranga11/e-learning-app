@extends('layouts.student')

@section('title', 'My Cart')

@section('content')
    <div class="container mt-4">
        <h2>My Purchased Lessons</h2>

        @if($purchases->isEmpty())
            <p>You haven't purchased any lessons yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Lesson Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->lesson->lesson_name }}</td>
                            <td>{{ $purchase->lesson->lesson_description }}</td>
                            <td>{{ $purchase->lesson->lesson_date }}</td>
                            <td>{{ $purchase->lesson->lesson_duration }}</td>
                            <td>
                                <a href="{{ route('lessons.join', ['lesson' => $purchase->lesson->id]) }}" class="btn btn-primary">Join Lesson</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
