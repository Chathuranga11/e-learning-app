@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Subject</h1>

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Subject Form -->
    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Subject Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $subject->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Subject</button>
    </form>
</div>
@endsection
