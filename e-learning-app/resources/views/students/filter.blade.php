@extends('layouts.student')

@section('title', 'Filter Teacher')

@section('content')
    <div class="container mt-4">
        <h2>Search Lessons by Teacher</h2>
        <form id="filterForm">
            @csrf
            <div class="mb-3 position-relative">
                <label for="teacher_name" class="form-label">Search Teacher</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Enter teacher name">
                <div id="teacherSuggestions" class="list-group position-absolute w-100"></div>
            </div>
            <button type="button" id="searchLessonsBtn" class="btn btn-primary" disabled>Get Lessons</button>
            <div id="lessonsList" class="mt-4"></div>
        </form>
    </div>

    <script>
        const teacherSuggestions = document.getElementById('teacherSuggestions');
        const teacherNameInput = document.getElementById('teacher_name');
        let selectedTeacherId = null;

        teacherNameInput.addEventListener('input', function () {
            const query = this.value;
            if (query.length > 1) {
                fetch(`/search-teachers?query=${query}`)
                    .then(response => response.json())
                    .then(teachers => {
                        teacherSuggestions.innerHTML = teachers.map(teacher => `
                            <a href="#" class="list-group-item list-group-item-action" data-id="${teacher.id}">
                                ${teacher.first_name} ${teacher.last_name}
                            </a>
                        `).join('');
                    });
            } else {
                teacherSuggestions.innerHTML = '';
            }
        });

        teacherSuggestions.addEventListener('click', function (event) {
            event.preventDefault();
            if (event.target.tagName === 'A') {
                teacherNameInput.value = event.target.textContent;
                selectedTeacherId = event.target.getAttribute('data-id');
                teacherSuggestions.innerHTML = '';
                document.getElementById('searchLessonsBtn').disabled = false;
            }
        });

        document.getElementById('searchLessonsBtn').addEventListener('click', function () {
            const token = document.querySelector('input[name="_token"]').value;

            fetch('{{ route('get.teacher.lessons') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ teacher_id: selectedTeacherId })
            })
            .then(response => response.json())
            .then(lessons => {
                const lessonsList = document.getElementById('lessonsList');
                if (lessons.length > 0) {
                    lessonsList.innerHTML = lessons.map(lesson => `
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">${lesson.lesson_name}</h5>
                                <p class="card-text">${lesson.lesson_description}</p>
                                <p class="card-text"><small class="text-muted">${lesson.lesson_date} | ${lesson.lesson_duration} | Fee: ${lesson.lesson_fee}</small></p>
                            </div>
                        </div>
                    `).join('');
                } else {
                    lessonsList.innerHTML = '<p>No lessons found for this teacher.</p>';
                }
            });
        });
    </script>
@endsection
