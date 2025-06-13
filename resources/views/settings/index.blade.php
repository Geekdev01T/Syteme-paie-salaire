@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Settings | StaffPay</title>
@endsection

<body>

    @section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h1 class="app-page-title">Settings</h1>
                    <a class="btn app-btn-secondary" href="{{ route('settings.reset') }}"
                        onclick="return confirm('Are you sure you want to reset all settings? This action cannot be undone.');">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bi size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        Reset Settings
                    </a>
                </div>


                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">General</h3>
                        <div class="section-intro">Settings intended for the company/establishment to collect its various
                            information allowing it to be identified.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{ route('settings.update_enterprise') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Company Name *<span class="ms-2"
                                                data-container="body" data-bs-toggle="popover" data-trigger="hover"
                                                data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                                    width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-info-circle" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                    </path>
                                                    <path
                                                        d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z">
                                                    </path>
                                                    <circle cx="8" cy="4.5" r="1"></circle>
                                                </svg></span></label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ old('name') ?? $enterprise->name }}" name="name">
                                        @error('name')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="type_organisation" class="form-label">Company Type *</label>
                                        <select class="form-select" id="type_organisation" name="type_organisation">
                                            <option value="">Select Company Type</option>
                                            <option value="etablissement_scolaire"
                                                {{ $enterprise->type_organisation == 'etablissement_scolaire' ? 'selected' : '' }}>
                                                Educational Establishment</option>
                                            <option value="entreprise"
                                                {{ $enterprise->type_organisation == 'entreprise' ? 'selected' : '' }}>
                                                Entreprise
                                            </option>
                                            <option value="association"
                                                {{ $enterprise->type_organisation == 'association' ? 'selected' : '' }}>
                                                Association</option>
                                            <option value="universite"
                                                {{ $enterprise->type_organisation == 'universite' ? 'selected' : '' }}>
                                                University
                                            </option>
                                            <option value="gouvernement"
                                                {{ $enterprise->type_organisation == 'gouvernement' ? 'selected' : '' }}>
                                                Government</option>
                                            <option value="ong"
                                                {{ $enterprise->type_organisation == 'ong' ? 'selected' : '' }}>ONG
                                            </option>
                                        </select>
                                        @error('type_organisation')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="slogan" class="form-label">Company Slogan</label>
                                        <input type="text" class="form-control" id="slogan" name="slogan"
                                            value="{{ old('slogan') ?? $enterprise->slogan }}">
                                        @error('slogan')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Company Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo"
                                            value="{{ old('logo') }}" accept="image/*">
                                        <div class="mt-2">
                                            <img src="{{ $enterprise->logo ? asset('storage/' . $enterprise->logo) : asset('images/login-bg.jpg') }}"
                                                alt="Company Logo"
                                                style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                        </div>
                                        @error('logo')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Company Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') ?? $enterprise->email }}">
                                        @error('email')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone1" class="form-label">Company Contact 1 *</label>
                                        <input type="tel" class="form-control" id="phone1" name="phone1"
                                            value=" {{ old('phone1') ?? $enterprise->phone1 }}">
                                        @error('phone1')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone2" class="form-label">Company Contact 2 </label>
                                        <input type="tel" class="form-control" id="phone2" name="phone2"
                                            value="{{ old('phone2') ?? $enterprise->phone2 }}">
                                        @error('phone2')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Company Address</label>
                                        <input type="tel" class="form-control" id="address" name="address"
                                            value="{{ old('address') ?? $enterprise->address }}">
                                        @error('address')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                </div>
                <hr class="mb-4">

                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Data</h3>
                        <div class="section-intro">Settings concerning the data used by the system for processing.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{ route('settings.update_config') }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="paiement_date" class="form-label">Paiement Date *</label>
                                        <input type="number" class="form-control" id="paiement_date"
                                            value="{{ old('paiement_date') ?? $configuration->paiement_date }}"
                                            name="paiement_date">
                                        <div class="text text-warning mb-1">
                                            <small>
                                                Payment date no later than the {{ $configuration->paiement_date }}th of
                                                each month
                                            </small>
                                        </div>
                                        @error('paiement_date')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="state_sheet_date" class="form-label">State Sheet Date</label>
                                        <input type="number" class="form-control" id="state_sheet_date"
                                            name="state_sheet_date"
                                            value="{{ old('state_sheet_date') ?? $configuration->state_sheet_date }}">
                                        <div class="text text-warning mb-1">
                                            <small>
                                                the latest date for sending status sheets is the
                                                {{ $configuration->state_sheet_date }}th of each month
                                            </small>
                                        </div>
                                        @error('state_sheet_date')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="supervised_work_fee" class="form-label">Supervised Work Fee</label>
                                        <input type="number" class="form-control" id="supervised_work_fee"
                                            name="supervised_work_fee"
                                            value="{{ old('supervised_work_fee') ?? $configuration->supervised_work_fee }}">
                                        <div class="text text-warning mb-1">
                                            <small>
                                                The fee for supervised work is set at
                                                {{ $configuration->supervised_work_fee }} FCFA
                                                per hour
                                            </small>
                                        </div>
                                        @error('superised_work_fee')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="monitoring_fee" class="form-label">Monitoring</label>
                                        <input type="number" class="form-control" id="monitoring_fee"
                                            name="monitoring_fee"
                                            value="{{ old('monitoring_fee') ?? $configuration->monitoring_fee }}">
                                        <div class="text text-warning mb-1">
                                            <small>
                                                The monitoring fee is set at {{ $configuration->monitoring_fee }} FCFA per
                                                day
                                            </small>
                                        </div>
                                        @error('monitoring_fee')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                </div>
                <hr class="mb-4">

                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">System</h3>
                        <div class="section-intro">Settings used to identify the system.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{route('settings.update_app')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="app_name" class="form-label">App Name *
                                            <span class="ms-2" data-container="body" data-bs-toggle="popover"
                                                data-trigger="hover" data-placement="top"
                                                data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                                    width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-info-circle" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                    </path>
                                                    <path
                                                        d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z">
                                                    </path>
                                                    <circle cx="8" cy="4.5" r="1"></circle>
                                                </svg></span>
                                        </label>
                                        <input type="text" class="form-control" id="app_name"
                                            value="{{ old('app_name') ?? $configuration->app_name }}"
                                            name="app_name">
                                        @error('app_name')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="language" class="form-label">App Language</label>
                                        <select class="form-select" id="language" name="language">
                                            <option value="">Select System Language</option>
                                            <option value="english"
                                                {{ $configuration->language == 'english' ? 'selected' : '' }}>
                                                English</option>
                                            <option value="french"
                                                {{ $configuration->language == 'french' ? 'selected' : '' }}>
                                                French
                                            </option>
                                        </select>
                                        @error('language')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo_app" class="form-label">App Logo</label>
                                        <input type="file" class="form-control" id="logo_app" name="logo_app"
                                            value="{{ old('logo_app') }}" accept="image/*">
                                        <div class="mt-2">
                                            <img src="{{ $configuration->logo ? asset('storage/' . $configuration->logo) : asset('images/logo.PNG') }}"
                                                alt="App Logo"
                                                style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                        </div>
                                        @error('logo_app')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                </div>
                <hr class="mb-4">

            </div>
        </div>
    @endsection
</body>
