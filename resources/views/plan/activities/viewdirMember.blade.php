@extends('plan.layouts.admin')
@section('title','daily plan')





@section('style')
     <!-- DataTables -->
        <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@stop


@section('content')
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Directorate Members List</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                            <h4 class="card-title">Members List</h4>




                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 ">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Picture</th>
                                                <th>Full Name</th>
                                                <th>User Name</th>
                                                <th>Email</th>

                                                <th class="text-center">Actions</th>
                                             </tr>
                                            </thead>

                                            <tbody>
                                                @if($director_members->count())
                                                @foreach($director_members as$key  =>$member)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>

                                             <div class="avatar-xs">
                                                                            <span class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                                                {{ucfirst(Str::limit($member->name, 1,' '))}}
                                                                            </span>
                                                                        </div>

                                                    </td>
                                                    <td>{{$member->name}}{{$member->last_name}}</td>
                                                    <td>{{$member->username}}</td>
                                                    <td>{{$member->email}}</td>

                                                    <td>
                                                        <div>
                                                            <div class="btn-group btn-group-example mb-3" role="group">

                                                             <a href="{{ route('daterange.expertview',[$member->id,$did]) }}"  class="btn btn-primary w-xs"><i class="mdi mdi-eye d-block font-size-16"></i></a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                @section('script')
      <!-- Required datatable js -->
        <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->


        <!-- Responsive examples -->
        <script src="{{ asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('admin/js/pages/datatables.init.js') }}"></script>
@stop

@endsection
