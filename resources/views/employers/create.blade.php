@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Create - Employer | StaffPay</title>
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
            <h1 class="app-page-title">Employees</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-2">
                    <h3 class="section-title">Add</h3>
                    <div class="section-intro">add a new employee here</div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('employer.store') }}" method="POST">
                                @csrf
                                {{-- <div class="mb-3">
                                    <label for="departement_id" class="form-label">Department *</label>
                                    <select class="form-select" id="departement_id" name="departement_id">
                                        <option value="">Select a department</option>
                                        @forelse ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('departement_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>

                                        @empty
                                            <option value="">No departments available</option>
                                        @endforelse
                                    </select>
                                    @error('departement_id')
                                        <div class="text text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name *<span class="ms-2"
                                            data-container="body" data-bs-toggle="popover" data-trigger="hover"
                                            data-placement="top"
                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                                width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z">
                                                </path>
                                                <circle cx="8" cy="4.5" r="1"></circle>
                                            </svg></span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="enter the employee's name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="enter the employee's first name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="enter the employee's email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact *</label>
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="enter the employee's contact" value="{{ old('contact') }}">
                                    @error('contact')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status *</label>
                                    <select class="form-control" name="status" id="status"
                                        onchange="toggleSalaryFields()">
                                        <option value="intermittent"
                                            {{ old('status') == 'intermittent' ? 'selected' : '' }}>Intermittent</option>
                                        <option value="permanent" {{ old('status') == 'permanent' ? 'selected' : '' }}>
                                            Permanent</option>
                                    </select>
                                    @error('status')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3" id="honorary-field" style="display: none;">
                                    <label for="honorary" class="form-label">Honorary *</label>
                                    <input type="number" class="form-control" id="honorary" name="honorary"
                                        placeholder="enter the employee's honorary" value="{{ old('honorary') }}">
                                    @error('honorary')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3" id="basic-salary-field" style="display: none;">
                                    <label for="basic_salary" class="form-label">Basic Salary *</label>
                                    <input type="number" class="form-control" id="basic_salary" name="basic_salary"
                                        placeholder="enter the employee's basic salary"
                                        value="{{ old('basic_salary') }}">
                                    @error('basic_salary')
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
    @endsection

    <script>
        function toggleSalaryFields() {
            var status = document.getElementById('status').value;
            var honoraryField = document.getElementById('honorary-field');
            var basicSalaryField = document.getElementById('basic-salary-field');
            if (status === 'permanent') {
                basicSalaryField.style.display = 'block';
                honoraryField.style.display = 'none';
            } else {
                honoraryField.style.display = 'block';
                basicSalaryField.style.display = 'none';
            }
        }
        // Appel au chargement pour gérer le cas du old('status')
        document.addEventListener('DOMContentLoaded', toggleSalaryFields);
    </script>
</body>
