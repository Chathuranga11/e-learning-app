@extends('layouts.teacher')

@section('title', 'Students Who Purchased')

@section('content')
    <div class="container mt-4">
        <h2>Students Who Purchased</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchasedStudents as $purchase)
                    <tr>
                        <td>{{ $purchase->student->first_name }} {{ $purchase->student->last_name }}</td>
                        <td>{{ $purchase->student->email }}</td>
                        <td>{{ $purchase->student->mobile }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
