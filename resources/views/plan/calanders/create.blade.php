@extends('plan.layouts.admin')
@section('title','daily plan')

@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 <link href="{{ asset('admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin/libs/%40chenfengyuan/datepicker/datepicker.min.css')}}">

@stop
@section('content')

   <div class="page-content">
                    <div class="container-fluid">
<div class="card">
                                    <div class="card-body">
    <div class="row">
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Events</h4>
            </span>



 <div class="col-xl-4">

 <a type="button" href="{{ route('calanders.calander.index') }}" class="btn btn-primary waves-effect waves-light" title="Create New Color">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <i class="bx bx-smile font-size-16 align-middle me-2"></i> View
  </a>
    </div >





        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
<br>
<br>
            <form method="POST" action="{{ route('calanders.calander.store') }}" accept-charset="UTF-8" id="create_calander_form" name="create_calander_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('plan.calanders.form', [
                                        'calander' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>
<br>
<br>
<br>
<br>
<br>
<br>

        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('script')
            <script src="{{ asset('admin/libs/select2/js/select2.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/spectrum-colorpicker2/spectrum.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/%40chenfengyuan/datepicker/datepicker.min.js' )}}"></script>

          <script src="{{ asset('admin/js/pages/form-advanced.init.js' )}}"></script>

        <script src="{{ asset('admin//js/app.js' )}}"></script>
@stop





