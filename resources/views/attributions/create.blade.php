@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Create - Attribution | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class="app-page-title">Attribution</h1>

            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-2">
                    <h3 class="section-title">Add</h3>
                    <div class="section-intro">add a new attribution here</div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('attribution.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="annee_academique" class="form-label">Academic Year *</label>
                                    @php
                                        $currentYear = date('Y');
                                        $currentMonth = date('n');
                                        if ($currentMonth < 9) {
                                            $academicYear = $currentYear - 1 . '-' . $currentYear;
                                        } else {
                                            $academicYear = $currentYear . '-' . ($currentYear + 1);
                                        }
                                    @endphp
                                    <input type="text" name="annee_academique" id="annee_academique" class="form-control"
                                        value="{{ old('annee_academique', $academicYear) }}" readonly>
                                    @error('annee_academique')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="employer_id" class="form-label">Teacher *</label>
                                    <select name="employer_id" id="employer_id" style="padding:0 .5em;"
                                        class="form-control">
                                        <option value="">Select teacher</option>
                                        @forelse ($employes as $employe)
                                            <option value="{{ $employe->id }}"
                                                {{ $employe->id == old('employer_id') ? 'selected' : '' }}>
                                                {{ $employe->name }}
                                            </option>
                                        @empty
                                            <option value="">No teachers available</option>
                                        @endforelse
                                    </select>
                                    @error('employer_id')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="classe_id" class="form-label">Class *</label>
                                    <select name="classe_id" id="classe_id" style="padding:0 .5em;" class="form-control">
                                        @forelse ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $class->id == old('classe_id') ? 'selected' : '' }}>{{ $class->name }}
                                            </option>
                                        @empty
                                            <option value="">No classes available</option>
                                        @endforelse
                                    </select>
                                    @error('classe_id')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cours_id" class="form-label">Course *</label>
                                    <select name="cours_id" id="cours_id" style="padding:0 .5em;" class="form-control">
                                        @forelse ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == old('cours_id') ? 'selected' : '' }}>{{ $course->name }}
                                            </option>
                                        @empty
                                            <option value="">No courses available</option>
                                        @endforelse
                                    </select>
                                    @error('cours_id')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn app-btn-primary">Save</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div>

            <hr class="my-4">
        </div>

        <script>
            document.getElementById('employer_id').addEventListener('change', function() {
                let employeId = this.value;

                // Charger les cours
                fetch(`/teacher/${employeId}/cours`)
                    .then(response => response.json())
                    .then(data => {
                        let coursSelect = document.getElementById('cours_id');
                        coursSelect.innerHTML = '';
                        if (data.length === 0) {
                            coursSelect.innerHTML = '<option value="">No courses available</option>';
                        } else {
                            data.forEach(cours => {
                                let option = document.createElement('option');
                                option.value = cours.id;
                                option.text = cours.name;
                                coursSelect.appendChild(option);
                            });
                        }
                    });

                // Charger les classes
                fetch(`/teacher/${employeId}/classes`)
                    .then(response => response.json())
                    .then(data => {
                        let classeSelect = document.getElementById('classe_id');
                        classeSelect.innerHTML = '';
                        if (data.length === 0) {
                            classeSelect.innerHTML = '<option value="">No classes available</option>';
                        } else {
                            data.forEach(classe => {
                                let option = document.createElement('option');
                                option.value = classe.id;
                                option.text = classe.name;
                                classeSelect.appendChild(option);
                            });
                        }
                    });
            });
        </script>
    @endsection
</body>
