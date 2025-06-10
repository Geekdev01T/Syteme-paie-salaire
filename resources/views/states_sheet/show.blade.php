@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Show - Sheet State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">

                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Sheet State of <strong>{{ $employe->name }}</strong> for<strong>
                            {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</strong></h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary btn-item" href="#" id="filter-btn">
                                    Filter
                                </a>
                                <a class="btn app-btn-secondary btn-item" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                    </svg>
                                    Send email
                                </a>
                                <a class="btn app-btn-secondary btn-item" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                    Download PDF
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row g-4 settings-section" id="state-filter-section" style="display: none;">
                <div class="col-12 col-md-4">
                    <h3 class="section-title" id="state-title">Filter</h3>
                    <div class="section-intro" id="state-intro">Filter sheet state here.</div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('state_sheet.show', $employe->id) }}" method="get">
                                @csrf
                                <div class="mb-3" id="date-state-field">
                                    <label for="date-state" class="form-label" style="width: 100%">Month</label>
                                    <input type="month" class="form-control" id="date-state" name="month"
                                        value="{{ old('month') ? old('month'): now()->format('Y-m') }}" max="{{ now()->format('Y-m') }}">
                                    @error('month')
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
                                <button type="submit" class="btn app-btn-primary btn-item">Filter</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
                <hr class="my-4">
            </div><!--//row-->

            {{-- Affichage de la fiche  d'état des cours --}}
            <div class="col-auto">
                <h2 class="app-page-title mb-2">Study State :
                    {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</h2>
            </div>
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($states as $state)
                                    @if ($state->state == 'study')
                                        <tr>
                                            <td class="cell">{{ str_pad(++$countStudy, 2, '0', STR_PAD_LEFT) }}</td>
                                            <td class="cell">
                                                {{ \Carbon\Carbon::parse($state->date)->locale('en')->format('d/m/Y') }}
                                            </td>
                                            <td class="cell"> {{ str_pad($state->hour, 2, '0', STR_PAD_LEFT) }} </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td class="cell" colspan="3" style="text-align: center;">
                                            No study states found.
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <th class="cell" colspan="2" style="text-align: center">Total</th>
                                    <td class="cell"> {{ str_pad($totalStudyHours, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- Affichage de la fiche d'état des TD --}}
            <div class="col-auto">
                <h2 class="app-page-title mb-2">Supervised Work State :
                    {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</h2>
            </div>
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($states as $state)
                                @if ($state->state == 'supervised-work')
                                    <tr>
                                        <td class="cell">{{ str_pad(++$countSupervisedWork, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="cell">
                                            {{ \Carbon\Carbon::parse($state->date)->locale('en')->format('d/m/Y') }}
                                        </td>
                                        <td class="cell"> {{ str_pad($state->hour, 2, '0', STR_PAD_LEFT) }} </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="cell" colspan="3" style="text-align: center;">
                                        No supervised work states found.
                                    </td>
                                </tr>
                            @endforelse
                                <tr>
                                    <th class="cell" colspan="2" style="text-align: center">Total</th>
                                    <td class="cell"><span class="truncate">{{ str_pad($totalSupervisedWorkHours, 2, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- Affichage de la fiche d'état des surveillances --}}
            <div class="col-auto">
                <h2 class="app-page-title mb-2">Monitoring State :
                    {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</h2>
            </div>
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($states as $state)
                                    @if ($state->state == 'monitoring')
                                        <tr>
                                            <td class="cell">{{ str_pad(++$countMonitoring, 2, '0', STR_PAD_LEFT) }}</td>
                                            <td class="cell">
                                                {{ \Carbon\Carbon::parse($state->date)->locale('en')->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td class="cell" colspan="2" style="text-align: center;">
                                            No monitoring states found.
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <th class="cell" style="text-align: center">Total</th>
                                    <td class="cell">{{ str_pad($totalDays, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- Affichage de la fiche d'état de retards --}}
            <div class="col-auto">
                <h2 class="app-page-title mb-2">Delay State :
                    {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</h2>
            </div>
            <div class="app-card app-card-orders-table mb-2">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Hour</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($delayStates as $index =>$delayState)
                                    <tr>
                                        <td class="cell">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="cell">
                                            {{ \Carbon\Carbon::parse($delayState->date)->locale('en')->format('d/m/Y') }}
                                        </td>
                                        <td class="cell"> {{ str_pad($delayState->hour, 2, '0', STR_PAD_LEFT) }} </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="3" style="text-align: center;">
                                            No delay states found.
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <th class="cell" colspan="2" style="text-align: center">Total</th>
                                    <td class="cell"><span class="truncate">{{ str_pad($totalDelayHours, 2, '0', STR_PAD_LEFT) }} </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($delayStates as $index => $delayState)
                                    <tr>
                                        <td class="cell">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="cell comment">
                                            {{ $delayState->comment ?? 'No description provided' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="2" style="text-align: center;">
                                            No delay states found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            {{-- Affichage du recapitulatif des états --}}
            <div class="col-auto">
                <h2 class="app-page-title mb-2">Summary States :
                    {{ \Carbon\Carbon::parse($month)->locale('en')->translatedFormat('F') }}</h2>
            </div>
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">State</th>
                                    <th class="cell">Hour / Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">Study State</td>
                                    <td class="cell">{{ str_pad($totalStudyHours, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>
                                <tr>
                                    <td class="cell">Supervised Work State</td>
                                    <td class="cell">{{ str_pad($totalSupervisedWorkHours, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>
                                <tr>
                                    <td class="cell">Delay State</td>
                                    <td class="cell">{{ str_pad($totalDelayHours, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>
                                <tr>
                                    <th class="cell" style="text-align: center">Total Hours</th>
                                    <td class="cell">{{ str_pad($totalMonthHours, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>
                                <tr>
                                    <th class="cell" style="text-align: center">Total Days</th>
                                    <td class="cell">{{ str_pad($totalDays, 2, '0', STR_PAD_LEFT) }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

        <hr class="my-4">

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div> --}}


        <script>
            // Gestion de l'affichage du formulaire de création d'état
            let filterBtn = document.getElementById('filter-btn');
            let stateFilterSection = document.getElementById('state-filter-section');
            let isStateSectionVisible = false;
            filterBtn.addEventListener('click', function(e) {
                e.preventDefault();
                stateFilterSection.style.transition = 'transform 0.4s ease-in-out';
                if (!isStateSectionVisible) {
                    stateFilterSection.style.display = 'flex';
                    isStateSectionVisible = true;
                } else {
                    stateFilterSection.style.display = 'none';
                    isStateSectionVisible = false;
                }
            });

            // Ouvre automatiquement le formulaire si des erreurs existent
            document.addEventListener('DOMContentLoaded', function() {
                @if ($errors->any())
                    let stateFilterSection = document.getElementById('state-filter-section');
                    stateFilterSection.style.display = 'block';
                    isStateSectionVisible = true;
                @endif
            });
        </script>
    @endsection


</body>
