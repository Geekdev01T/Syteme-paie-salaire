@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Sheet State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">
            @if (PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification'])
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Attention!</strong>
                    {{ PaymentAndSheetNotifications::getPaymentAndSheetNotifications()['SendSheetNotification']['message'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Sheet State</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                                    </svg>
                                    Send All
                                </a>
                                <a class="btn app-btn-secondary" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                    Download All
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
                    data-bs-toggle="tab">Intermittent Employees</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="employes-permanent-tab" data-bs-toggle="tab"
                    href="#employes-permanent">Permanent Employees</a>
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
                                                        href="{{ route('state_sheet.show', $employe->id) }}">Show</a>
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
                                                            href="{{ route('state_sheet.show', $employe->id) }}">Show</a>
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
                                                            href="{{ route('state_sheet.show', $employe->id) }}">Show</a>
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
