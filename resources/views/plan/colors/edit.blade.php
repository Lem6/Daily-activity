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

            {{-- <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Color' }}</h4>
            </div> --}}


              <div class="btn-group btn-group-example mb-3" role="group">
                                                            <button type="button" onclick="location.href ='{{ route('colors.color.index') }}' "  class="btn btn-outline-primary w-sm">View </button>
                                                            <button type="button"  onclick="location.href ='{{ route('colors.color.create') }}' " class="btn btn-outline-primary w-sm">Create </button>

                                                        </div>




        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('colors.color.update', $color->id) }}" id="edit_color_form" name="edit_color_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('plan.colors.form', [
                                        'color' => $color,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

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
