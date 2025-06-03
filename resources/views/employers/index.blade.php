@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> List - Employes | StaffPay</title>
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
                    <h1 class="app-page-title mb-0">Employes List</h1>
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

                                    New Employee
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
                                                    <td class="cell">{{ str_pad(++$empint, 2, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $employe->contact }}</span>
                                                    </td>
                                                    <td></td>
                                                    {{-- @if ($department->section)
                                                    <td class="cell">{{ $department->section }}</td>
                                                @else
                                                    <td class="cell">No Section</td>
                                                @endif --}}
                                                    {{-- <td class="cell">
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('departments.edit', $department->id) }}">Edit</a>
                                                        <form action="{{ route('departments.destroy', $department->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-sm app-btn-danger">Delete</button>
                                                        </form>
                                                    </td> --}}
                                                </tr>
                                            @endif


                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No intermittent employee found.</td>
                                            </tr>
                                        @endforelse
                                        @if ($empint == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">No intermittent employee found.</td>
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
                                                    <td class="cell">{{ str_pad(++$empper, 2, '0', STR_PAD_LEFT) }}</td>
                                                    <td class="cell">
                                                        <span class="truncate">{{ $employe->name }}</span>
                                                    </td>
                                                    <td class="cell">{{ $employe->email }}</td>
                                                    <td class="cell"><span
                                                            class="truncate">{{ $employe->contact }}</span>
                                                    </td>
                                                    <td></td>
                                                    {{-- @if ($department->section)
                                                    <td class="cell">{{ $department->section }}</td>
                                                @else
                                                    <td class="cell">No Section</td>
                                                @endif --}}
                                                    {{-- <td class="cell">
                                                        <a class="btn-sm app-btn-secondary"
                                                            href="{{ route('departments.edit', $department->id) }}">Edit</a>
                                                        <form action="{{ route('departments.destroy', $department->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-sm app-btn-danger">Delete</button>
                                                        </form>
                                                    </td> --}}
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
        </div>
    @endsection
</body>
