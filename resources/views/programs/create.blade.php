@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Create - Program | StaffPay</title>
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
            <h1 class="app-page-title">Programming</h1>

            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-2">
                    <h3 class="section-title">Add</h3>
                    <div class="section-intro">add a new program here</div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('program.store') }}" method="POST">
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
                                    <label for="attribution_id" class="form-label">attribution *</label>
                                    <select name="attribution_id" id="attribution_id" style="padding:0 .5em;"
                                        class="form-control">
                                        @forelse ($attributions as $attribution)
                                            <option value="{{ $attribution->id }}"
                                                {{ $attribution->id == old('attribution_id') ? 'selected' : '' }}>
                                                {{ $attribution->employer->name }} -> {{ $attribution->classe->name }} -> {{ $attribution->cours->name }}
                                            </option>
                                        @empty
                                            <option value="">No attributions available</option>
                                        @endforelse
                                    </select>
                                    @error('attribution_id')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Type *</label>
                                    <select name="type" id="type" style="padding:0 .5em;" class="form-control">
                                        <option value="cours" {{ old('type') == 'active' ? 'selected' : '' }}>Course
                                        </option>
                                        <option value="TD" {{ old('type') == 'inactive' ? 'selected' : '' }}>
                                            TD</option>
                                    </select>
                                    @error('type')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Date *</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="debut" class="form-label">Start Time *</label>
                                    <input type="time" class="form-control" id="debut" name="debut"
                                        value="{{ old('debut') }}">
                                    @error('debut')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fin" class="form-label">End Time *</label>
                                    <input type="time" class="form-control" id="fin" name="fin"
                                        value="{{ old('fin') }}">
                                    @error('fin')
                                        <p class="text text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="salle_id" class="form-label">Classroom *</label>
                                    <select name="salle_id" id="salle_id" style="padding:0 .5em;" class="form-control">
                                        @forelse ($rooms as $room)
                                            <option value="{{ $room->id }}"
                                                {{ $room->id == old('salle_id') ? 'selected' : '' }}>{{ $room->name }}
                                            </option>
                                        @empty
                                            <option value="">No classrooms available</option>
                                        @endforelse
                                    </select>
                                    @error('salle_id')
                                        <p class="text text-danger">{{ $message }}</p>
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
</body>
