@extends('layouts.app', ['title' => 'Add panel lawyer'])

@section('content')
    @include('users.partials.header', [
        'title' => 'Add New Panel Lawyer',
        'description' => __('This is panel lawyer create page. You can create new panel lawyer'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">Add New Panel Lawyer</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('panelLawyers.store') }}">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Panel lawyer information</h6>
                            
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-first_name">First Name</label>
                                        <input type="text" name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First name" value="{{ old('first_name') }}" required>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-last_name">Last Name</label>
                                        <input type="text" name="last_name" id="input-last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last name" value="{{ old('last_name') }}" required>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-birthday">Birth Date</label>
                                    <input type="date" name="birth_date" id="input-birthday" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Birth date" value="{{ old('birth_date') }}" required>
                                    @if ($errors->has('birth_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('district_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-district">District</label>
                                    <input type="text" name="district_name" id="input-district" class="form-control form-control-alternative{{ $errors->has('district_name') ? ' is-invalid' : '' }}" placeholder="District name" value="{{ old('district_name') }}" required>
                                    @if ($errors->has('district_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('district_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('nationality') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reg-date">Nationlity</label>
                                    <input type="date" name="nationality" id="input-reg-date" class="form-control form-control-alternative{{ $errors->has('nationality') ? ' is-invalid' : '' }}" placeholder="Nationality" value="{{ old('nationality') }}" required>
                                    @if ($errors->has('nationality'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('enrollment_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reg-date">Enrollment Date</label>
                                    <input type="date" name="enrollment_date" id="input-reg-date" class="form-control form-control-alternative{{ $errors->has('enrollment_date') ? ' is-invalid' : '' }}" placeholder="Enrollment date" value="{{ old('enrollment_date') }}" required>
                                    @if ($errors->has('enrollment_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('enrollment_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
