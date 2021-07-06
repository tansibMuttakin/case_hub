@extends('layouts.app', ['title' => __('My Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ', '. auth()->user()->first_name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="d-flex justify-content-end">
            <a href="{{route('profile.edit')}}">
                <button type="button" class="btn btn-primary my-1">Edit Profile</button>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">My Profile</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" style="border-collapse:collapse;">
                            <tbody>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">First Name</td>
                                    <td style="background:#e7e7e77a;">{{$user->first_name}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Last Name</td>
                                    <td style="background:#e7e7e77a;">{{$user->last_name}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Email</td>
                                    <td style="background:#e7e7e77a;">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Phone</td>
                                    <td style="background:#e7e7e77a;">{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Birth Date</td>
                                    <td style="background:#e7e7e77a;">{{$user->birth_date}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">District</td>
                                    <td style="background:#e7e7e77a;">{{$user->district_name}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Registration Date</td>
                                    <td style="background:#e7e7e77a;">{{$user->reg_date}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Last Visit</td>
                                    <td style="background:#e7e7e77a;">{{$user->last_visit}}</td>
                                </tr>
                                <tr>
                                    <td class="label font-weight-bold text-right" style="background:#e5f1ef;">Status</td>
                                    <td style="background:#e7e7e77a;"><span class="p-1 text-white rounded {{$user->is_active?'bg-success':'bg-danger'}}">{{$user->is_active?'Active':'Disable'}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-2" style="background:#f2dede;">
                            <p class="text-center font-weight-500 m-0">Total Number Of Criminal Case Entry: 1 | Total Number Of Civil Case Entry: 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection  