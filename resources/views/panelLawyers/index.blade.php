@extends('layouts.app', ['title' => 'Panel Lawyers'])
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endpush
@section('content')
@include('users.partials.header', [
    'title' => 'Manage Panel Lawyers',
    'description' => __('This is panel lawyers page. You can see information about all panel lawyers and can make changes to some of their status'),
    'class' => 'col-lg-7'
])
<div class="container-fluid mt--7">
        <div class="d-flex justify-content-end">
            <a href="{{route('panelLawyers.create')}}">
                <button type="button" class="btn btn-primary my-1">Add New Panel Lawyers</button>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="align-items-center mb-2">
                            <h3 class="mb-0">All Panle Lawyers</h3>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Chamber Address</th>
                                    <th>Enrollment</th>
                                    <th>Bar Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($panel_lawyers as $lawyer)
                                <tr>
                                    <td>{{$lawyer->first_name}} {{$lawyer->last_name}}</td>
                                    <td>{{$lawyer->email}}</td>
                                    <td>{{$lawyer->phone}}</td>
                                    <td>{{$lawyer->district_name}}</td>
                                    <td>{{$lawyer->chamber_address}}</td>
                                    <td>{{$lawyer->enrollment_date}}</td>
                                    <td>{{$lawyer->bar_name}}</td>
                                    <td>
                                        <a href=""><i class="fas fa-eye text-success"></i></a>
                                        <a href=""><i class="fas fa-edit text-info"></i></a>
                                        <a href="" onclick="event.preventDefault(); document.getElementById('lawyer-delete-{{$lawyer->id}}').submit();"><i class="fas fa-trash text-danger"></i></a>
                                        <form id="lawyer-delete-{{$lawyer->id}}" action="" method="post">
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