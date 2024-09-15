@extends('layouts.teacher')

@section('title', 'My Profile')

@section('content')
<div class="container mt-4">
    <h2>My Profile</h2>
    <form action="{{ route('teacher.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ auth('teacher')->user()->first_name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ auth('teacher')->user()->last_name }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth('teacher')->user()->email }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="mobile" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ auth('teacher')->user()->mobile }}">
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-6 mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ auth('teacher')->user()->subject->name }}" readonly>
            </div> --}}
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ auth('teacher')->user()->city }}" readonly>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-warning">Update Contact Number</button>
        </div>
    </form>
</div>
@endsection
