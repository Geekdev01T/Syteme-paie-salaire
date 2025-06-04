@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Show - Department | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Department code : {{$department->code}}</h1>
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
                                            <div class="item-data">{{$department->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Description</strong></div>
                                            <div class="item-data">{{$department->description}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Section</strong></div>
                                            <div class="item-data">
                                                {{$department->section}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>workforce</strong></div>
                                            <div class="item-data">
                                                {{ str_pad($count, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-secondary" href="{{route('department.edit', $department->id)}}">Edit</a>
                                <form action="{{ route('department.delete', $department->id) }}"
                                    method="POST" class="d-inline">
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

                                @forelse ($employes as $employe)
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Employer</strong></div>
                                                <div class="item-data">
                                                    <a href="{{route('employer.show', $employe->id)}}">
                                                        {{ $employe->name }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="item-label"><strong>Contact</strong></div>
                                                <div class="item-data">
                                                    {{ $employe->contact }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label"><strong>No members found</strong></div>
                                                <div class="item-data">This department has no members yet.</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>
