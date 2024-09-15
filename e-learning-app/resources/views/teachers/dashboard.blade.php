@extends('layouts.teacher')

@section('title', 'Teacher Dashboard')

@section('content')
    <!-- Welcome Message with Animation -->
    <div class="welcome-message">
        <h2>Hi, {{ auth('teacher')->user()->first_name }}!</h2>
        <p>Welcome to NC Tutorial Services!</p>
        <p>We're excited to have you on board. This platform is designed to make learning accessible, engaging, and efficient. Whether you're here to enhance your skills, explore new subjects, or prepare for your next big opportunity, we've got you covered. Dive into our diverse range of courses, connect with expert instructors, and join a community of learners just like you. Your journey to knowledge starts here—let's learn, grow, and succeed together!</p>
        <p>Happy learning! 🎓✨</p>
    </div>
@endsection
