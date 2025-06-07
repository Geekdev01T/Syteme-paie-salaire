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
                    <h1 class="app-page-title mb-0">Edit Attendance State</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Sheet sate
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
                role="tablist">
                <a class="flex-sm-fill text-sm-center nav-link active" id="study-state-tab" data-bs-toggle="tab"
                    href="#study-state">Study State </a>
                <a class="flex-sm-fill text-sm-center nav-link" id="supervised-state-tab" href="#supervised-state"
                    data-bs-toggle="tab">Supervised Work State</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="departments-english-tab" data-bs-toggle="tab"
                    href="#monitoring-state">Monitoring State</a>
            </nav>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="study-state" role="tabpanel">
                    <div class="row g-4 settings-section">
                        <div class="col-12 col-md-4">
                            <h3 class="section-title">Study State</h3>
                            <div class="section-intro">Add a new study state here.</div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="app-card app-card-settings shadow-sm p-4">

                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <div class="mb-3">
                                            <label for="day-state" class="form-label" style="width: 100%">Day
                                                <input type="date" class="form-control" id="day-state">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hours" class="form-label">Hours</label>
                                            <input type="number" class="form-control" id="hours"
                                                placeholder="Enter the numbers of hours">
                                        </div>
                                        <button type="submit" class="btn app-btn-primary">Save</button>
                                    </form>
                                </div><!--//app-card-body-->

                            </div><!--//app-card-->
                        </div>
                    </div><!--//row-->
                    <hr class="my-4">

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
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Day</strong></div>
                                        <div class="item-data">
                                            <a href="#">
                                                Amy Walter--
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Hours</strong></div>
                                        <div class="item-data">
                                            17786454
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button href="#" class="btn-sm app-btn-secondary">update</button>
                                        <form action="#" method="post" style="margin-top:.5em">
                                            <input type="hidden" name="" value="">
                                            <button class="btn-sm app-btn-secondary"
                                                onclick="return confirm('do you really want to delete')">delete</button>
                                        </form>

                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Day</strong></div>
                                        <div class="item-data">
                                            <a href="#">
                                                Amy Walter--
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Hours</strong></div>
                                        <div class="item-data">
                                            17786454
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button href="#" class="btn-sm app-btn-secondary">update</button>
                                        <form action="#" method="post" style="margin-top:.5em">
                                            <input type="hidden" name="" value="">
                                            <button class="btn-sm app-btn-secondary"
                                                onclick="return confirm('do you really want to delete')">delete</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr class="my-4">
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade" id="supervised-state" role="tabpanel">
                    <div class="tab-pane fade show active" id="study-state" role="tabpanel">
                        <div class="row g-4 settings-section">
                            <div class="col-12 col-md-4">
                                <h3 class="section-title">Supervised Work State</h3>
                                <div class="section-intro">Add a new supervised work state here.</div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="app-card app-card-settings shadow-sm p-4">

                                    <div class="app-card-body">
                                        <form class="settings-form">
                                            <div class="mb-3">
                                                <label for="week-state" class="form-label" style="width: 100%">Day
                                                    <input type="date" class="form-control" id="week-state">
                                            </div>
                                            <div class="mb-3">
                                                <label for="hours" class="form-label">Hours</label>
                                                <input type="number" class="form-control" id="hours"
                                                    placeholder="Enter the numbers of hours">
                                            </div>
                                            <button type="submit" class="btn app-btn-primary">Save</button>
                                        </form>
                                    </div><!--//app-card-body-->

                                </div><!--//app-card-->
                            </div>
                        </div><!--//row-->
                        <hr class="my-4">

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
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Day</strong></div>
                                            <div class="item-data">
                                                <a href="#">
                                                    Amy Walter--
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Hours</strong></div>
                                            <div class="item-data">
                                                17786454
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button href="#" class="btn-sm app-btn-secondary">update</button>
                                            <form action="#" method="post" style="margin-top:.5em">
                                                <input type="hidden" name="" value="">
                                                <button class="btn-sm app-btn-secondary"
                                                    onclick="return confirm('do you really want to delete')">delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Day</strong></div>
                                            <div class="item-data">
                                                <a href="#">
                                                    Amy Walter--
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Hours</strong></div>
                                            <div class="item-data">
                                                17786454
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button href="#" class="btn-sm app-btn-secondary">update</button>
                                            <form action="#" method="post" style="margin-top:.5em">
                                                <input type="hidden" name="" value="">
                                                <button class="btn-sm app-btn-secondary"
                                                    onclick="return confirm('do you really want to delete')">delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="my-4">
                    </div>
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade" id="monitoring-state" role="tabpanel">
                    <div class="tab-pane fade show active" id="study-state" role="tabpanel">
                        <div class="row g-4 settings-section">
                            <div class="col-12 col-md-4">
                                <h3 class="section-title">Monitoring State</h3>
                                <div class="section-intro">Add a new monitoring state here.</div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="app-card app-card-settings shadow-sm p-4">

                                    <div class="app-card-body">
                                        <form class="settings-form">
                                            <div class="mb-3">
                                                <label for="week-state" class="form-label" style="width: 100%">Day
                                                    <input type="date" class="form-control" id="week-state">
                                            </div>
                                            <button type="submit" class="btn app-btn-primary">Save</button>
                                        </form>
                                    </div><!--//app-card-body-->

                                </div><!--//app-card-->
                            </div>
                        </div><!--//row-->
                        <hr class="my-4">

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
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Day</strong></div>
                                            <div class="item-data">
                                                <a href="#">
                                                    Amy Walter--
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button href="#" class="btn-sm app-btn-secondary">update</button>
                                        </div>
                                        <div class="col-auto">
                                            <form action="#" method="post">
                                                <input type="hidden" name="" value="">
                                                <button class="btn-sm app-btn-secondary"
                                                    onclick="return confirm('do you really want to delete')">delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Day</strong></div>
                                            <div class="item-data">
                                                <a href="#">
                                                    Amy Walter--
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button href="#" class="btn-sm app-btn-secondary">update</button>
                                        </div>
                                        <div class="col-auto">
                                            <form action="#" method="post">
                                                <input type="hidden" name="" value="">
                                                <button class="btn-sm app-btn-secondary"
                                                    onclick="return confirm('do you really want to delete')">delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="my-4">
                    </div>
                </div>
            </div>


        </div>

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div> --}}
    @endsection
</body>
