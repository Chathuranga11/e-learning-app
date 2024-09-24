@extends('layouts.teacher')

@section('title', 'Students Who Purchased')

@section('content')
    <div class="container mt-4">
        <h2>Students Who Purchased Lesson: {{ $lesson->lesson_name }}</h2>
        @if($purchases->isEmpty())
            <p>No students have purchased this lesson yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->student->first_name }} {{ $purchase->student->last_name }}</td>
                            <td>{{ $purchase->student->email }}</td>
                            <td>{{ $purchase->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
