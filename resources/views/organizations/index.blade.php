@extends('plan.layouts.admin')
@section('title','Organizational unit list')
@section('style')
 <!-- DataTables -->
 <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

 <!-- Responsive datatable examples -->
 <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

 @stop
@section('content')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0 font-size-18">Organizational Units</h4>

<div class="page-title-right">
<ol class="breadcrumb m-0">

<div class="col-xl col-sm-6 align-self-end">
<div>
    @can('organizational_unit_create')
    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#myModal">Add New Unit </button>
  @endcan
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">New Organizational Unit </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <form action="{{route('organizations.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="example-text-input" >Unit Name<span class="text-danger">*</span></label>

                            <input type="text" name="directorate_name" onkeypress="return /^[a-zA-Z\s]+$/i.test(event.key)"  id="directorate_name" class="form-control " value="{{Request::old('directorate_name') ? : ''}}"placeholder="unit name">
                            <span class="text-danger">{{$errors->first('directorate_name')}}</span>


                    </div>


                    <div class="form-group">
                        <br>
                        <label for="example-text-input" >Parent Unit<span class="text-danger">*</span></label>

                            <select name="org_id"class="form-control ">
                                <option value="">select Parent </option>
                            @foreach($org_units as $org)
                            <option value="{{$org->id}}" {{ old('org_id') ? 'selected' : '' }} >{{$org->name}}</option>
                            @endforeach
                           </select>
                        <span class="text-danger">{{$errors->first('org_id')}}</span>

                    </div>


                    <div class="modal-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-md">Create</button>


                            </div>
                        </div>
                        </form>
                    </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>
</ol>
</div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h4 class="card-title mb-3align-middle">List of Organizational Units</h4>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<div class="table-responsive mt-5">
    <table id="datatable" class="table  dt-responsive  nowrap w-100">
        <thead>
            <tr>
                <th >Name</th>
                <th >Parent Unit</th>
                <th scope="col">Action</th>
            </tr>

        </thead>

            <!-- Table body -->

        <tbody>

@foreach($org_units as $org  )
            <tr>
                    <td>{{ $org->name }}</td>
                    @if($org->parent)
                    <td>{{$org->parent->name}} </td>
                    @else
                    <td></td>
                    @endif
                    <td>
                        <div class="d-flex gap-3">
                            @can('organizational_unit_edit')
                            <a data-bs-toggle="modal" data-bs-target="#editmodal-{{$org->id}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                            @endcan
                            @can('organizational_unit_delete')
                            <a href="{!! route('organizations.show', Crypt::encrypt($org->id)) !!}" title="Delete Organization Unit" onclick="return confirm(&quot;Click ok to delete Organization Unit.?&quot;)" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                            @endcan
                        </div>
                    </td>
                </tr>
<!-- Edit modal content -->
<div id="editmodal-{{$org->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Organizational Unit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('organizations.update',$org->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                            @method('put')


                    <div class="form-group">
                        <label for="example-text-input" >Edit Unit Name<span class="text-danger">*</span></label>

                            <input type="text" value="{{$org->name}}" name="directorate_name" onkeypress="return /^[a-zA-Z\s]+$/i.test(event.key)"  id="directorate_name" class="form-control " value="{{Request::old('directorate_name') ? : ''}}"placeholder="unit name">
                            <span class="text-danger">{{$errors->first('directorate_name')}}</span>


                    </div>


                    <div class="form-group">
                        <br>

                        @if($org->id!='1')
                        <label for="example-text-input" >Parent Unit<span class="text-danger">*</span></label>
                            <select name="org_id"class="form-control ">
                                <option value="">select Parent </option>
                            @foreach($org_units as $orgselect)
                            {{-- <option value="{{$org->id}}" {{ old('org_id') ? 'selected' : '' }} >{{$org->name}}</option> --}}
                              {{-- @if($org->id!=$orgselect->id) --}}
                              <option value="{{ $orgselect->id }}" @if($orgselect->id ==$org->parent_id) selected @endif>{{ $orgselect->name }}</option>
                              {{-- <option value="{{$orgselect->id}}"  {{ $orgselect->id ==1 ? 'selected' : '' }}>{{$orgselect->id}}</option> --}}
                             {{-- <option  {{ old('org_id', $orgselect->id) == $org->parent_id ? 'selected' : '' }}>{{$orgselect->name}}</option> --}}
                            {{-- @endif --}}
                            @endforeach

                           </select>
                          @else
                           <input type="hidden" value="1" name="org_id">
                           @endif

                        <span class="text-danger">{{$errors->first('org_id')}}</span>

                    </div>


                    <div class="modal-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-md">Save Changes</button>


                            </div>
                        </div>
                        </form>
                    </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




                @endforeach

        </tbody>



    </table>
</div>










</div>
</div>
</div>
</div>
<!-- end row -->

</div> <!-- container-fluid -->
</div>
@endsection

@section('script')
	   <!-- Required datatable js -->
	   <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	   <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	    <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
	@stop
