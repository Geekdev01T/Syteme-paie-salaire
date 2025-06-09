@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Store - State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Delay State of <strong>{{ $employe->name }}</strong></h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="#" id="create-state-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    Create state
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row g-4 settings-section" style="display: none" id="state-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title" id="state-title">Study State</h3>
                        <div class="section-intro" id="state-intro">Add a new study state here.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{ route('state.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <select name="state" class="form-control" id="state" style="padding: 0.5rem;">
                                            <option value="{{ old('state') }}" {{ old('state') ? 'selected' : '' }}>
                                                Select a state</option>
                                            <option value="study" {{ old('state') == 'study' ? 'selected' : '' }}>
                                                Study</option>
                                            <option value="supervised-work"
                                                {{ old('state') == 'supervised-work' ? 'selected' : '' }}>
                                                Supervised Work</option>
                                            <option value="monitoring" {{ old('state') == 'monitoring' ? 'selected' : '' }}>
                                                Monitoring</option>
                                        </select>
                                        @error('state')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="date-state-field">
                                        <label for="date-state" class="form-label" style="width: 100%">Date</label>
                                        <input type="date" class="form-control" id="date-state" name="date"
                                            value="{{ old('date') }}">
                                        @error('date')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="hour-state-field">
                                        <label for="hours" class="form-label">Hours</label>
                                        <input type="number" class="form-control" id="hours" name="hour"
                                            placeholder="Enter the numbers of hour" value="{{ old('hour') }}">
                                        @error('hour')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="employer_id"
                                            value="{{ $employe->id }}">
                                        @error('employer_id')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                    <hr class="my-4">
                </div><!--//row-->
            </div>

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
                role="tablist">
                <a class="flex-sm-fill text-sm-center nav-link active" id="study-state-tab" data-bs-toggle="tab"
                    href="#study-state">Study State </a>
                <a class="flex-sm-fill text-sm-center nav-link" id="supervised-state-tab" data-bs-toggle="tab"
                    href="#supervised-state">Supervised Work State</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="monitoring-state-tab" data-bs-toggle="tab"
                    href="#monitoring-state">Monitoring State</a>
            </nav>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="study-state" role="tabpanel">
                    <div class="app-card shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Study States</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                @forelse ($states as $state)
                                    @if ($state->state == 'study')
                                        <p style="display: none">{{ $state_study++ }}</p>
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Date</strong></div>
                                                <div class="item-data">
                                                    {{ \Carbon\Carbon::parse($state->date)->locale('en')->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="item-label">
                                                    <strong>Hour{{ $state->hour > 1 ? 's' : '' }}</strong>
                                                </div>
                                                <div class="item-data">
                                                    {{ str_pad($state->hour, 2, '0', STR_PAD_LEFT) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('state.edit', $state->id, $employe->id) }}"
                                                    class="btn-sm app-btn-secondary" style="padding:.2em;">update</a>
                                                <form action="{{ route('state.delete', $state->id) }}" method="post"
                                                    style="margin-top:.5em">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-sm app-btn-secondary"
                                                        onclick="return confirm('do you really want to delete')">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    @endif
                                @empty
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No states found</strong></div>
                                        <div class="item-data">
                                            No states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endforelse
                                @if ($state_study == 0)
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No study states found</strong></div>
                                        <div class="item-data">
                                            No study states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endif
                            </div>

                        </div>
                    </div>

                    <hr class="my-4">
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade" id="supervised-state" role="tabpanel">
                    <div class="app-card shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Supervised Work State</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                @forelse ($states as $state)
                                    @if ($state->state == 'supervised-work')
                                        <p style="display: none">{{ $state_supervised++ }}</p>
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Date</strong></div>
                                                <div class="item-data">
                                                    {{ \Carbon\Carbon::parse($state->date)->locale('en')->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="item-label">
                                                    <strong>Hour{{ $state->hour > 1 ? 's' : '' }}</strong>
                                                </div>
                                                <div class="item-data">
                                                    {{ str_pad($state->hour, 2, '0', STR_PAD_LEFT) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('state.edit', $state->id, $employe->id) }}"
                                                    class="btn-sm app-btn-secondary" style="padding:.2em;">update</a>
                                                <form action="#" method="post" style="margin-top:.5em">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-sm app-btn-secondary"
                                                        onclick="return confirm('do you really want to delete')">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    @endif
                                @empty
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No states found</strong></div>
                                        <div class="item-data">
                                            No states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endforelse
                                @if ($state_supervised == 0)
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No supervised work states found</strong></div>
                                        <div class="item-data">
                                            No supervised work states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endif
                            </div>

                        </div>
                    </div>

                    <hr class="my-4">
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade" id="monitoring-state" role="tabpanel">
                    <div class="app-card shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Monitoring State</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                @forelse ($states as $state)
                                    @if ($state->state == 'monitoring')
                                        <p style="display: none">{{ $state_monitoring++ }}</p>
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Date</strong></div>
                                                <div class="item-data">
                                                    {{ \Carbon\Carbon::parse($state->date)->locale('en')->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('state.edit', $state->id) }}"
                                                    class="btn-sm app-btn-secondary" style="padding:.2em;">update</a>
                                                <form action="#" method="post" style="margin-top:.5em">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-sm app-btn-secondary"
                                                        onclick="return confirm('do you really want to delete')">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    @endif
                                @empty
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No states found</strong></div>
                                        <div class="item-data">
                                            No states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endforelse
                                @if ($state_monitoring == 0)
                                    <div class="col-auto">
                                        <div class="item-label"><strong>No monitoring states found</strong></div>
                                        <div class="item-data">
                                            No monitoring states have been created for this employee.
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                @endif
                            </div>

                        </div>
                    </div>

                    <hr class="my-4">
                </div>
            </div>


        </div>

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div> --}}


        <script>
            // Gestion de l'affichage du formulaire de création d'état
            let createStateBtn = document.getElementById('create-state-btn');
            let stateSection = document.getElementById('state-section');
            let isStateSectionVisible = false;
            createStateBtn.addEventListener('click', function(e) {
                e.preventDefault();
                stateSection.style.transition = 'transform 0.4s ease-in-out';
                if (!isStateSectionVisible) {
                    stateSection.style.display = 'inline-flex';
                    isStateSectionVisible = true;
                } else {
                    stateSection.style.display = 'none';
                    isStateSectionVisible = false;
                }
            });

            // Ouvre automatiquement le formulaire si des erreurs existent
            document.addEventListener('DOMContentLoaded', function() {
                @if ($errors->any())
                    let stateSection = document.getElementById('state-section');
                    stateSection.style.display = 'inline-flex';
                    isStateSectionVisible = true;
                @endif
            });

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
                    title.textContent = 'Study State';
                    intro.textContent = 'Add a new study state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'block';
                } else if (state === 'supervised-work') {
                    title.textContent = 'Supervised Work State';
                    intro.textContent = 'Add a new supervised work state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'block';
                } else if (state === 'monitoring') {
                    title.textContent = 'Monitoring State';
                    intro.textContent = 'Add a new monitoring state here.';
                    dateField.style.display = 'block';
                    hourField.style.display = 'none'; // Pas d'heures pour le monitoring
                } else {
                    title.textContent = 'State';
                    intro.textContent = 'Add a new state here.';
                    dateField.style.display = 'none';
                    hourField.style.display = 'none';
                }

            }
            // Appel au chargement pour gérer le cas du old('state')
            document.addEventListener('DOMContentLoaded', toggleStateFields);



            // Sauvegarde l'onglet actif dans le localStorage lors du clic
            document.querySelectorAll('.nav-link').forEach(function(tab) {
                tab.addEventListener('click', function(e) {
                    localStorage.setItem('activeStateTab', this.getAttribute('href'));
                });
            });

            // Au chargement, active l'onglet sauvegardé ou le premier par défaut
            document.addEventListener('DOMContentLoaded', function() {
                let activeTab = localStorage.getItem('activeStateTab');
                if (!(activeTab == "#study-state" || activeTab == "#supervised-state" || activeTab == "#monitoring-state")) {
                    // Si rien dans le localStorage, active le premier onglet et panel
                    let firstTab = document.querySelector('.nav-link');
                    let firstPane = document.querySelector('.tab-pane');
                    if (firstTab && firstPane) {
                        firstTab.classList.add('active');
                        firstPane.classList.add('show', 'active');
                    }
                } else {
                    // Désactive tous les onglets et panels
                    document.querySelectorAll('.nav-link').forEach(function(tab) {
                        tab.classList.remove('active');
                    });
                    document.querySelectorAll('.tab-pane').forEach(function(pane) {
                        pane.classList.remove('show', 'active');
                    });

                    // Active l'onglet et le panel sauvegardés
                    let tabToActivate = document.querySelector('.nav-link[href="' + activeTab + '"]');
                    let paneToActivate = document.querySelector(activeTab);
                    if (tabToActivate && paneToActivate) {
                        tabToActivate.classList.add('active');
                        paneToActivate.classList.add('show', 'active');
                    }
                }
            });
        </script>
    @endsection


</body>
