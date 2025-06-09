@extends('layout/app')
@extends('layout.template')

@section('title-content')
    <title> Edit - Delay State | StaffPay</title>
@endsection

<body>
    @section('content')
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">

                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Delay State of <strong>{{ $employe->name }}</strong></h1>
                </div>
                <hr class="my-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title" id="state-title">Edit</h3>
                        <div class="section-intro" id="state-intro">Edit a delay state here.</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="{{route('state_delay.update', $state_delay->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    
                                    <div class="mb-3" id="date-state-field">
                                        <label for="date-state" class="form-label" style="width: 100%">Date</label>
                                        <input type="date" class="form-control" id="date-state" name="date"
                                            value="{{ $state_delay->date ? $state_delay->date : old('date') }}">
                                        @error('date')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="hour-state-field">
                                        <label for="hours" class="form-label">Hours</label>
                                        <input type="number" class="form-control" id="hours" name="hour"
                                            placeholder="Enter the numbers of hour" value="{{ $state_delay->hour ? $state_delay->hour : old('hour') }}">
                                        @error('hour')
                                            <div class="text text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description *</label>
                                        <textarea class="form-control textarea" id="description" name="comment" placeholder="enter the delay descritpion">{{ $state_delay->comment ? $state_delay->comment : old('comment') }}</textarea>
                                        @error('comment')
                                            <p class="text text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Update</button>
                                </form>
                            </div><!--//app-card-body-->

                        </div><!--//app-card-->
                    </div>
                    <hr class="my-4">
                </div><!--//row-->
            </div>


        </div>

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $employes->links() }}
        </div> --}}


    @endsection


</body>
