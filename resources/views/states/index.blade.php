@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Attendance State</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>


                                    Reset All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
                role="tablist">
                <a class="flex-sm-fill text-sm-center nav-link active" id="departments-all-tab" data-bs-toggle="tab"
                    href="#departments-all">All</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="departments-french-tab" href="#departments-french"
                    data-bs-toggle="tab">Intermittent Employees</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="departments-english-tab" data-bs-toggle="tab"
                    href="#departments-english">Permanent Employees</a>
            </nav>


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="departments-all" role="tabpanel">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Contact</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employes as $index => $employe)
                                            <tr>

                                                <td class="cell">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td class="cell">
                                                    <span class="truncate">{{ $employe->name }}</span>
                                                </td>
                                                <td class="cell"> <a href=""></a>{{ $employe->email }}</td>
                                                <td class="cell"><span class="truncate">{{ $employe->contact }}</span>
                                                </td>
                                                <td>
                                                    <a class="btn-sm app-btn-secondary"
                                                        href="{{ route('state.create', $employe->id) }}">Store</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Employee found.</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="tab-pane fade" id="departments-french" role="tabpanel">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">

                                <table class="table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Contact</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($employes as $employe)
                                            @if ($employe->status == 'intermittent')
                                                <tr>

                                                    <td class="cell">
                                                        {{ str_pad(++$empint, 2, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span class="truncate">{{ $employe->contact }}</span>
                                                    </td>
                                                    <td>
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('state.create', $employe->id) }}">Store</a>
                                                    </td>
                                                </tr>
                                            @endif


                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No intermittent employee found.
                                                </td>
                                            </tr>
                                        @endforelse
                                        @if ($empint == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">No intermittent employee found.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="departments-english" role="tabpanel">
                    <div class="app-card app-card-orders-table mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Order</th>
                                            <th class="cell">Name</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Contact</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employes as $employe)
                                            @if ($employe->status == 'permanent')
                                                <tr>

                                                    <td class="cell">
                                                        {{ str_pad(++$empper, 2, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $employe->contact }}</span>
                                                    </td>
                                                    <td>
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('state.create', $employe->id) }}">Store</a>
                                                    </td>

                                                </tr>
                                            @endif


                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No permanent employee found.
                                                </td>
                                            </tr>
                                        @endforelse
                                        @if ($empper == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">No permanent employee found.
                                                </td>
                                            </tr>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div>

        <script>
            // Sauvegarde l'onglet actif dans le localStorage lors du clic
            document.querySelectorAll('.nav-link').forEach(function(tab) {
                tab.addEventListener('click', function(e) {
                    localStorage.setItem('activeStateTab', this.getAttribute('href'));
                });
            });

            // Au chargement, active l'onglet sauvegardé ou le premier par défaut
            document.addEventListener('DOMContentLoaded', function() {
                let activeTab = localStorage.getItem('activeStateTab');
                if (!(activeTab == "#departments-all" || activeTab == "#departments-french" || activeTab == "#departments-english")) {
                    // Si l'onglet actif n'est pas sauvegardé ou n'est pas valide, on le remet à null
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
