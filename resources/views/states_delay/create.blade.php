@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Store - Delay State | StaffPay</title>
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
                                <a class="btn app-btn-secondary btn-item" href="{{route('state_sheet.show', $employe->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Sheet state
                                </a>
                                <a class="btn app-btn-secondary btn-item" href="#" id="create-state-btn">
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
                        <h3 class="section-title" id="state-title">Delay State</h3>
                        <div class="section-intro" id="state-intro">Add a new delay state here.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{ route('state_delay.store') }}" method="post">
                                    @csrf
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
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description *</label>
                                        <textarea class="form-control textarea" id="description" name="comment" placeholder="enter the delay descritpion">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <p class="text text-danger mt-2">{{ $message }}</p>
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


            <div class="tab-content">
                <div class="tab-pane fade show active" id="study-state" role="tabpanel">
                    <div class="app-card shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Delay States</h4>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-body px-4 w-100">
                            <div class="app-card app-card-orders-table mb-5">
                                <div class="app-card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 text-left">
                                            <thead>
                                                <tr>
                                                    <th class="cell">Order</th>
                                                    <th class="cell">Date</th>
                                                    <th class="cell">Hour</th>
                                                    <th class="cell">Description</th>
                                                    <th class="cell">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($delay_states as $index => $delay_state)
                                                    <tr>
                                                        <td class="cell">{{ str_pad(++$index, 2, '0', STR_PAD_LEFT) }}
                                                        </td>
                                                        <td class="cell"><span
                                                                class="truncate">{{ \Carbon\Carbon::parse($delay_state->date)->locale('en')->translatedFormat('d F Y') }}</span>
                                                        </td>
                                                        <td class="cell">
                                                            {{ str_pad($delay_state->hour, 2, '0', STR_PAD_LEFT) }}</td>
                                                        <td class="cell"><span
                                                                class="truncate">{{ $delay_state->comment }}</span>
                                                        </td>
                                                        <td class="cell">
                                                            <a class="btn-sm app-btn-secondary"
                                                                href="{{ route('state_delay.edit', $delay_state->id) }}">Edit</a>
                                                            <form
                                                                action="{{ route('state_delay.delete', $delay_state->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('do you really want to delete')"
                                                                    class="btn-sm app-btn-secondary">Delete</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td style="text-align: center;" colspan="5">
                                                            No delay states found.
                                                        </td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
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
        </script>
    @endsection


</body>
