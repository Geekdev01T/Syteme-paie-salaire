@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Create - Employer | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">
            <h1 class="app-page-title">Employers</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-2">
                    <h3 class="section-title">Add</h3>
                    <div class="section-intro">add a new employer here</div>
                </div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_departement" class="form-label">Department *</label>
                                    <select class="form-select" id="id_departement" name="id_departement" required>
                                        <option value="">Select a department</option>
                                    </select>
                                    @error('id_departement')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name *<span class="ms-2" data-container="body"
                                            data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                            data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg
                                                width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                </path>
                                                <path
                                                    d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z">
                                                </path>
                                                <circle cx="8" cy="4.5" r="1"></circle>
                                            </svg></span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="enter the employer's name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="enter the employer's first name" value="{{ old('first_name') }}"
                                        required>
                                    @error('first_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="enter the employer's email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact *</label>
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="enter the employer's contact" value="{{ old('contact') }}" required>
                                    @error('contact')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
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
