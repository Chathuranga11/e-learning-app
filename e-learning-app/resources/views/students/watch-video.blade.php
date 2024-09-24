@extends('layouts.student')

@section('title', 'Watch Video')

@section('content')
<div class="container mt-4">
    <h2>Watch Video: {{ $lesson->lesson_name }}</h2>
    <p>{{ $lesson->lesson_description }}</p>
    
    <!-- Embed a video player (use a placeholder or a real video link) -->
    <video width="100%" height="400" controls>
        <source src="path_to_your_video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <a href="{{ route('video.on.demand') }}" class="btn btn-secondary mt-4">Back to Video On Demand</a>
</div>
@endsection
