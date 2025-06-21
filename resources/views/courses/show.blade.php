@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Show - Course | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Course code : {{ $course->code }}</h1>
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
                                            <div class="item-label"><strong>Name</strong></div>
                                            <div class="item-data">{{ $course->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Section</strong></div>
                                            <div class="item-data">
                                                {{ $department->section }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Department</strong></div>
                                            <div class="item-data">
                                                <a href="{{ route('department.show', $department->id) }}">
                                                    {{ $department->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Code</strong></div>
                                            <div class="item-data">
                                                {{ $department->code }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-secondary" href="{{ route('course.edit', $course->id) }}">Edit</a>
                                <form action="{{ route('course.delete', $course->id) }}" method="POST" class="d-inline">
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
                                        <h4 class="app-card-title">Members</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-body px-4 w-100">

                                {{-- @forelse ($employes as $employe) --}}
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Employer</strong></div>
                                            <div class="item-data">
                                                {{-- <a href="{{route('employer.show', $employe->id)}}">
                                                        {{ $employe->name }}
                                                    </a> --}}Test
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Contact</strong></div>
                                            <div class="item-data">
                                                {{-- {{ $employe->contact }} --}}Test
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- @empty
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>No members found</strong></div>
                                                <div class="item-data">This department has no members yet.</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>
