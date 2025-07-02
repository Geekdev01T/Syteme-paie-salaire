@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> List - Teachers | StaffPay</title>
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
                    <h1 class="app-page-title mb-0">Teachers List</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('employer.create') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>

                                    New Teacher
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
                role="tablist">
                <a class="flex-sm-fill text-sm-center nav-link" id="employes-all-tab" data-bs-toggle="tab"
                    href="#employes-all">All</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="employes-intermittent-tab" href="#employes-intermittent"
                    data-bs-toggle="tab">Intermittent Teachers</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="employes-permanent-tab" data-bs-toggle="tab"
                    href="#employes-permanent">Permanent Teachers</a>
            </nav>


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade" id="employes-all" role="tabpanel">
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
                                                <td class="cell">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                                <td class="cell">
                                                    <span class="truncate">{{ $employe->name }}</span>
                                                </td>
                                                <td class="cell">{{ $employe->email }}</td>
                                                <td class="cell"><span class="truncate">{{ $employe->contact }}</span>
                                                </td>
                                                <td class="cell">
                                                    <a class="btn-sm app-btn-secondary"
                                                        href="{{ route('employer.show', $employe->id) }}">Show</a>
                                                    <a class="btn-sm app-btn-secondary"
                                                        href="{{ route('employer.edit', $employe->id) }}">Edit</a>
                                                    <form action="{{ route('employer.delete', $employe->id) }}"
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
                                                <td colspan="6" class="text-center">No Employee found.</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="tab-pane fade" id="employes-intermittent" role="tabpanel">
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
                                                    <td class="cell">{{ str_pad(++$empint, 2, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $employe->contact }}</span>
                                                    </td>

                                                    <td class="cell">
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('employer.show', $employe->id) }}">Show</a>
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('employer.edit', $employe->id) }}">Edit</a>
                                                        <form action="{{ route('employer.delete', $employe->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('do you really want to delete')"
                                                                class="btn-sm app-btn-secondary">Delete</button>
                                                        </form>
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

                <div class="tab-pane fade" id="employes-permanent" role="tabpanel">
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
                                                    <td class="cell">{{ str_pad(++$empper, 2, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $employe->contact }}</span>
                                                    </td>
                                                    <td class="cell">
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('employer.show', $employe->id) }}">Show</a>
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('employer.edit', $employe->id) }}">Edit</a>
                                                        <form action="{{ route('employer.delete', $employe->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('do you really want to delete')"
                                                                class="btn-sm app-btn-secondary">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif


                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No permanent employee found.</td>
                                            </tr>
                                        @endforelse
                                        @if ($empper == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">No permanent employee found.</td>
                                            </tr>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $employes->links() }}
            </div>

        </div>

        <script>
            // Cible uniquement les onglets du bloc employés
            const tabNav = document.getElementById('orders-table-tab');
            const tabContent = document.getElementById('orders-table-tab-content');

            if (tabNav && tabContent) {
                tabNav.querySelectorAll('.nav-link').forEach(function(tab) {
                    tab.addEventListener('click', function(e) {
                        localStorage.setItem('activeEmployeTab', this.getAttribute('href'));
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    let activeTab = localStorage.getItem('activeEmployeTab');
                    const validTabs = ['#employes-all', '#employes-intermittent', '#employes-permanent'];
                    if (!validTabs.includes(activeTab)) {
                        // Active le premier onglet et panel si rien n'est sauvegardé ou si la valeur n'est pas valide
                        let firstTab = tabNav.querySelector('.nav-link');
                        let firstPane = tabContent.querySelector('.tab-pane');
                        if (firstTab && firstPane) {
                            firstTab.classList.add('active');
                            firstPane.classList.add('show', 'active');
                        }
                    } else {
                        // Désactive tous les onglets et panels de ce bloc seulement
                        tabNav.querySelectorAll('.nav-link').forEach(function(tab) {
                            tab.classList.remove('active');
                        });
                        tabContent.querySelectorAll('.tab-pane').forEach(function(pane) {
                            pane.classList.remove('show', 'active');
                        });

                        // Active l'onglet et le panel sauvegardés
                        let tabToActivate = tabNav.querySelector('.nav-link[href="' + activeTab + '"]');
                        let paneToActivate = tabContent.querySelector(activeTab);
                        if (tabToActivate && paneToActivate) {
                            tabToActivate.classList.add('active');
                            paneToActivate.classList.add('show', 'active');
                        }
                    }
                });
            }
        </script>
    @endsection
</body>
