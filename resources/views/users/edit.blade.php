@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => 'Edit'.' '.$user->first_name.' '.$user->last_name,
        'description' => __('This is user edit page. You can make changes to user information'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">Edit User Profile</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update',$user) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
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
                                        <input type="text" name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First name" value="{{ old('first_name', $user->first_name) }}" required>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-last_name">Last Name</label>
                                        <input type="text" name="last_name" id="input-last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last name" value="{{ old('last_name', $user->last_name) }}" required>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-birthday">Birth Date</label>
                                    <input type="date" name="birth_date" id="input-birthday" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Birth date" value="{{ old('birth_date', $user->birth_date) }}" required>
                                    @if ($errors->has('birth_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('district_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-district">District</label>
                                    <input type="text" name="district_name" id="input-district" class="form-control form-control-alternative{{ $errors->has('district_name') ? ' is-invalid' : '' }}" placeholder="District name" value="{{ old('district_name', $user->district_name) }}" required>
                                    @if ($errors->has('district_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('district_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('reg_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-reg-date">Registration Date</label>
                                    <input type="date" name="reg_date" id="input-reg-date" class="form-control form-control-alternative{{ $errors->has('reg_date') ? ' is-invalid' : '' }}" placeholder="Registration date" value="{{ old('reg_date', $user->reg_date) }}" required>
                                    @if ($errors->has('reg_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('reg_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_visit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-last-visit">Last Visit</label>
                                    <input type="date" name="last_visit" id="input-last-visit" class="form-control form-control-alternative{{ $errors->has('last_visit') ? ' is-invalid' : '' }}" placeholder="Registration date" value="{{ old('last_visit', $user->last_visit) }}" required>
                                    @if ($errors->has('last_visit'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_visit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('is_active') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-is-active">Status</label>
                                    <select name="is_active" class="form-control form-control-alternative" id="input-is-active">
                                        <option value="1" {{$user->is_active?'selected':''}}>Active</option>
                                        <option value="0" {{!($user->is_active)?'selected':''}}>Disable</option>
                                    </select>
                                    @if ($errors->has('is_active'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('is_active') }}</strong>
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
