@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">




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


        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Color' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('colors.color.destroy', $color->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('colors.color.index') }}" class="btn btn-primary" title="Show All Color">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('colors.color.create') }}" class="btn btn-success" title="Create New Color">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('colors.color.edit', $color->id ) }}" class="btn btn-primary" title="Edit Color">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Color" onclick="return confirm(&quot;Click Ok to delete Color.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Planing Time</dt>
            <dd>{{ $color->planing_time }}</dd>
            <dt>Reporting Time</dt>
            <dd>{{ $color->reporting_time }}</dd>
            <dt>Color</dt>
            <dd>{{ $color->color }}</dd>

        </dl>

    </div>
</div>

@endsection
@section('script')
      <script src="{{ asset('admin/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{ asset('admin/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

        <script src="{{ asset('admin/libs/select2/js/select2.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/spectrum-colorpicker2/spectrum.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js' )}}"></script>
        <script src="{{ asset('admin/libs/%40chenfengyuan/datepicker/datepicker.min.js' )}}"></script>
    <script src="{{ asset('admin//js/pages/form-advanced.init.js' )}}"></script>

        <script src="{{ asset('admin/js/app.js')}}"></script>
@stop
