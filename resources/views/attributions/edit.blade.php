@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Edit - Attribution | StaffPay</title>
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
                    <h3 class="section-title">Edit</h3>
                    <div class="section-intro">edit a new attribution here</div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('attribution.update', $attribution->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="annee_academique" class="form-label">Academic Year *</label>
                                    <input type="text" name="annee_academique" id="annee_academique" class="form-control"
                                        value="{{ $attribution->annee_academique }}" readonly>
                                    @error('annee_academique')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="employer_id" class="form-label">Teacher *</label>
                                    <select name="employer_id" id="employer_id" style="padding:0 .5em;" class="form-control"
                                        readonly>
                                        <option value="{{ $attribution->employer_id }}">
                                            {{ $attribution->employer->name }}
                                        </option>
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
                                                {{ $class->id == old('classe_id') || $class->id == $attribution->classe_id ? 'selected' : '' }}>
                                                {{ $class->name }}
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
                                                {{ $course->id == old('cours_id') || $course->id == $attribution->cours_id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @empty
                                            <option value="">No courses available</option>
                                        @endforelse
                                    </select>
                                    @error('cours_id')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn app-btn-primary">update</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div>

            <hr class="my-4">
        </div>

    @endsection
</body>
