@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Edit - State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">

                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Attendance State of <strong>{{ $employe->name }}</strong></h1>
                </div>
                <hr class="my-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title" id="state-title">Edit</h3>
                        <div class="section-intro" id="state-intro">Edit a attendance state here.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{ route('state.update', $state->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <select name="state" class="form-control" id="state" style="padding: 0.5rem;">
                                            <option value="{{ $state->state }}" {{ $state->state ? 'selected' : '' }}>
                                                Select a state</option>
                                            <option value="study" {{ $state->state == 'study' ? 'selected' : '' }}>
                                                Study</option>
                                            <option value="supervised-work"
                                                {{ $state->state == 'supervised-work' ? 'selected' : '' }}>
                                                Supervised Work</option>
                                            <option value="monitoring"
                                                {{ $state->state == 'monitoring' ? 'selected' : '' }}>
                                                Monitoring</option>
                                        </select>
                                        @error('state')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="date-state-field">
                                        <label for="date-state" class="form-label" style="width: 100%">Date</label>
                                        <input type="date" class="form-control" id="date-state" name="date"
                                            value="{{ $state->date ? $state->date : old('date') }}">
                                        @error('date')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="hour-state-field">
                                        <label for="hours" class="form-label">Hours</label>
                                        <input type="number" class="form-control" id="hours" name="hour"
                                            placeholder="Enter the numbers of hour"
                                            value="{{ $state->hour ? $state->hour : old('hour') }}">
                                        @error('hour')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="hour-state-field">
                                        <input type="hidden" class="form-control" name="employer_id"
                                            value="{{ $employe->id }}">
                                        @error('employer_id')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Update</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                    <hr class="my-4">
                </div><!--//row-->
            </div>


        </div>

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div> --}}


        <script>
            // Gestion de l'affichage des champs en fonction de l'état sélectionné
            document.getElementById('state').addEventListener('change', toggleStateFields);

            function toggleStateFields() {
                let state = document.getElementById('state').value;
                let dateField = document.getElementById('date-state-field');
                let hourField = document.getElementById('hour-state-field');
                let title = document.getElementById('state-title');
                let intro = document.getElementById('state-intro');
                // Mise à jour du titre et de l'introduction en fonction de l'état sélectionné
                if (state === 'study') {
                    title.textContent = 'Edit Study State';
                    intro.textContent = 'Edit a study state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'block';
                } else if (state === 'supervised-work') {
                    title.textContent = 'Edit Supervised Work State';
                    intro.textContent = 'Edit a supervised work state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'block';
                } else if (state === 'monitoring') {
                    title.textContent = 'Edit Monitoring State';
                    intro.textContent = 'Edit a monitoring state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'none'; // Pas d'heures pour le monitoring
                } else {
                    title.textContent = 'Edit';
                    intro.textContent = 'Edit a attendance state here.';
                    dateField.style.display = 'none';
                    hourField.style.display = 'none';
                }

            }
            // Appel au chargement pour gérer le cas du old('state')
            document.addEventListener('DOMContentLoaded', toggleStateFields);
        </script>
    @endsection


</body>
