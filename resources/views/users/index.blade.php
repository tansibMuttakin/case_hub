@extends('layouts.app', ['title' => 'Users'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endpush
@section('content')
@include('users.partials.header', [
    'title' => 'Manage User',
    'description' => __('This is your user management page. You can see information about your user and can make changes to some of their information'),
    'class' => 'col-lg-7'
])
<div class="container-fluid mt--7">
        <div class="d-flex justify-content-end">
            <a href="">
                <button type="button" class="btn btn-primary my-1">Add New User</button>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="align-items-center mb-2">
                            <h3 class="mb-0">All Users</h3>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="example" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birth Date</th>
                                    <th>District</th>
                                    <th>Reg Date</th>
                                    <th>Last Visit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->birth_date}}</td>
                                    <td>{{$user->district_name}}</td>
                                    <td>{{$user->reg_date}}</td>
                                    <td>{{$user->last_visit}}</td>
                                    <td>
                                        <small class="p-1 text-white rounded {{$user->is_active?'bg-success':'bg-danger'}}">
                                            {{$user->is_active?'Active':'Disable'}}
                                        </small>
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',$user)}}"><i class="fas fa-edit text-info"></i></a>
                                        <a href="{{route('user.destroy',$user)}}" onclick="event.preventDefault(); document.getElementById('user-delete-{{$user->id}}').submit();"><i class="fas fa-trash text-danger"></i></a>
                                        <form id="user-delete-{{$user->id}}" action="{{route('user.destroy',$user)}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush