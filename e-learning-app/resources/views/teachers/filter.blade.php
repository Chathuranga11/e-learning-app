@extends('layouts.student')

@section('title', 'Filter Teacher')

@section('content')
    <div class="container mt-4">
        <h2>Filter Teachers by Subject</h2>
        <form id="filterForm">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Select Subject</label>
                <select class="form-select" id="subject" name="subject_id">
                    <option value="">-- Select Subject --</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="teachersList"></div>
        </form>
    </div>
    <!-- JavaScript for handling the teacher filter -->
    <script>
        document.getElementById('subject').addEventListener('change', function () {
            const subjectId = this.value;
            const token = document.querySelector('input[name="_token"]').value;
            fetch('{{ route('filter.teacher.get') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ subject_id: subjectId })
            })
            .then(response => response.json())
            .then(teachers => {
                const teachersList = document.getElementById('teachersList');
                teachersList.innerHTML = teachers.map(teacher => `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${teacher.first_name} ${teacher.last_name}</h5>
                            <a href="/teacher/${teacher.id}/lessons" class="btn btn-primary">Select Teacher</a>
                        </div>
                    </div>
                `).join('');
            });
        });
    </script>
@endsection
