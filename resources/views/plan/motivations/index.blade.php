@extends('plan.layouts.admin')
@section('title','daily plan')
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
<h4 class="mb-sm-0 font-size-18">Motivational Quotes</h4>

<div class="page-title-right">
<ol class="breadcrumb m-0">

<div class="col-xl col-sm-6 align-self-end">
<div>
    @can('motivation_create')
    <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#myModal">Add New Quote</button>
@endcan
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('motivations.motivation.store') }}" accept-charset="UTF-8" id="create_motivation_form" name="create_motivation_form" class="form-horizontal">
                {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">New Qoute <b style="color:red">*</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="qoute" id="enterquote" required rows="3" placeholder="Enter Your quote here..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div><!-- /.modal-content -->
                </form>
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
<h4 class="card-title mb-3align-middle">List of Quotes</h4>

<div class="table-responsive mt-5">
    <table id="datatable" class="table  dt-responsive  nowrap w-100">
    {{-- <table class="table table-hover datatable dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
        <thead>
            <tr>
                <th style="width:100%;" class="align-left" >Quotes</th>
                <th scope="col" class="align-middle" >View</th>
                <th scope="col">Action</th>
            </tr>

        </thead>

            <!-- Table body -->

        <tbody>

@foreach($motivations as $motivation  )
            <tr>
                <?php
  $text = $motivation->qoute;
  $newtext = wordwrap($text, 150, "<br />");

?>
                    <td>{!! $newtext !!}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target="#viewmodal-{{$motivation->id}}">
                            <i class=" fas fa-eye" style="width: 40px;"></i>
                    </button>
                    </td>
                    <td>
                        <div class="d-flex gap-3">
                            @can('motivation_edit')
                            <a data-bs-toggle="modal" data-bs-target="#editmodal-{{$motivation->id}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                            @endcan
                            @can('motivation_delete')
                            <a href="{!! route('motivations.motivation.destroy', $motivation->id) !!}" title="Delete Motivation" onclick="return confirm(&quot;Click Ok to delete Motivation.?&quot;)" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                            @endcan
                        </div>
                    </td>
                </tr>
<!-- Edit modal content -->
<div id="editmodal-{{$motivation->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        <form method="POST" action="{{ route('motivations.motivation.update', $motivation->id) }}" id="edit_motivation_form" name="edit_motivation_form" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Quotes <b style="color:red">*</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" name="qoute" id="enterquote"  required rows="3" >{{$motivation->qoute}}</textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



                                <!-- subscribeModal -->
<div class="modal fade" id="viewmodal-{{$motivation->id}}" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header border-bottom-0">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="text-center mb-4">
<div class="avatar-md mx-auto mb-4">
<div class="avatar-title bg-light rounded-circle text-primary h1">
<i class="mdi mdi-email-open"></i>
</div>
</div>

<div class="row justify-content-center">
<div class="col-xl-10">
<p style="color: rgb(14, 10, 248)" class= "font-size-20 mb-4">{{ $motivation->qoute }}</p>

<h4 class="text-primary">መልካም የተግባር ቀን !!</h4>


</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- end modal -->
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
