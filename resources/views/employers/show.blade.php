@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Show - Employer | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="app-page-title">Employer name : {{ $employer->name }}</h1>
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>First Name</strong></div>
                                            <div class="item-data">{{ $employer->first_name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Email</strong></div>
                                            <div class="item-data">{{ $employer->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Contact</strong></div>
                                            <div class="item-data">
                                                {{ $employer->contact }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>number departments</strong></div>
                                            <div class="item-data">
                                                {{ str_pad($count, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Status</strong></div>
                                            <div class="item-data" style="margin-top: 0.5em">
                                                @if ($employer->status == 'intermittent')
                                                    <span class="badge bg-warning text-dark">Intermittent</span>
                                                @else
                                                    <span class="badge bg-success">Permanent</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            @if ($employer->status == 'permanent')
                                                <div class="item-label"><strong>Fixed Salary</strong></div>
                                                <div class="item-data" style="margin-top: 0.5em">
                                                    @if ($employer->fixed_salary)
                                                        {{ $employer->fixed_salary }} FCFA
                                                    @else
                                                        <span class="badge bg-secondary">Not set</span>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="item-label"><strong>Honorary</strong></div>
                                                <div class="item-data" style="margin-top: 0.5em">
                                                    @if ($employer->honorary)
                                                        {{ $employer->honorary }} FCFA
                                                    @else
                                                        <span class="badge bg-secondary">Not set</span>
                                                    @endif

                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-secondary" href="{{ route('employer.edit', $employer->id) }}">Edit</a>
                                <form action="{{ route('employer.delete', $employer->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('do you really want to delete')"
                                        class="btn app-btn-secondary">Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Departments</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-body px-4 w-100">

                                @forelse ($departements_lies as $departement_lie)
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Department</strong></div>
                                                <div class="item-data">
                                                    <a href="{{ route('department.show', $departement_lie->id) }}">
                                                        {{ $departement_lie->name }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Code</strong></div>
                                                <div class="item-data">
                                                    {{ $departement_lie->code }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{ route('employer.deletedep', $employer->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="departement_id"
                                                        value="{{ $departement_lie->id }}">
                                                    <button class="btn-sm app-btn-secondary"
                                                        onclick="return confirm('do you really want to delete')">delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>No department found</strong></div>
                                                <div class="item-data">This employee does not belong to any department yet.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                                <form class="col-auto" style="margin-top: 1em;"
                                    action="{{ route('employer.storedep', $employer->id) }}" method="post">
                                    @csrf
                                    <div class="col-auto mb-3">
                                        <label for="department_name" class="form-label">Department Name</label>
                                        <select style="padding:0 .5em;" class="form-control" name="departement_id"
                                            id="department_name">
                                            @forelse ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @empty
                                                <option value="">No departments available</option>
                                            @endforelse
                                        </select>
                                        @error('departement_id')
                                            <p class="text text-danger">{{ $message }}</p>
                                        @enderror

                                        <button type="submit" style="margin-top: .5em"
                                            class="btn app-btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>
