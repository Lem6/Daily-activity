@extends('layouts.main')
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




                         <div class="row">
    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
  <div class="card">
                                    <div class="card-body">
    <div class="row">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Score Card
                    @can('color_create')
                    <a type="button" href="{{ route('colors.color.create') }}" class="btn btn-primary waves-effect waves-light" title="Create New Color">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                    <i class="bx bx-smile font-size-16 align-middle me-2"></i> Create
    
                      </a>
                      @endcan
                </h4>
                
            </div>


        </div>

        @if(count($colors) == 0)
            <div class="panel-body text-center">
                <h4>No Colors Available.</h4>
            </div>
        @else

         <table class="table table-bordered dt-responsive  nowrap w-100"  id="datatable">
                                            <thead>
                                                <tr>

                                                     <th scope="col">#</th>
                                                    <th scope="col">plan start time</th>
                                                    <th scope="col">plan end time</th>
                                                    <th scope="col">Progress start time</th>
                                                    <th scope="col">Edit time</th>

                                                    <th scope="col">Color </th>
                                                     <th scope="col">Description </th>
                                                    <th  scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody name="tabelplan" id="tabelplan"  >


                                                            @foreach($colors as $color)
                                                    <tr>

                                                     <td>{{$loop->index +1}}</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">{{ $color->plan_start_time }}</a></h5>
                                                    </td>
                                                    <td>{{ $color->plan_end_time }}</td>
                                                    <td>{{ $color->progress_start_time }}</td>
                                                          <td>{{ $color->edit_time}}</td>
                                                                <td>{{ $color->color }}</td>
                                                                <td>{{ $color->name }}</td>
                                                    <td>
                                                            <form method="POST" action="{!! route('colors.color.destroy', $color->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                                       <div class="btn-group btn-group-example mb-3" role="group">
                                                            {{-- <button type="button" onclick="location.href ='{{ route('colors.color.show', $color->id ) }}' "  class="btn btn-outline-primary w-sm">Show</button> --}}
                                                            @can('color_edit')
                                                            <button  type="button" onclick="location.href ='{{ route('colors.color.edit', $color->id ) }}' "  class="btn btn-outline-primary w-sm" >Edit </button>
                                                           @endcan
                                                            @can('color_delete')
                                                        
                                                            <button   type="submit" onclick="return confirm(&quot;Click Ok to delete Color.&quot;)" class="btn btn-outline-primary w-sm" >Delete</button>
                                                          @endcan
                                                        </div>
                                                        </form>
                                                    </td>

                                                </tr>
                                                        @endforeach
                                            </tbody>


                                        </table>
                                           <div class="panel-footer">
            {!! $colors->render() !!}
        </div>

        @endif
        {{-- <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-nowrap align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Planing Time</th>
                            <th>Reporting Time</th>
                            <th>Color</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->plan_start_time }}</td>
                            <td>{{ $color->plan_end_time }}</td>
                            <td>{{ $color->color }}</td>

                            <td>

                                <form method="POST" action="{!! route('colors.color.destroy', $color->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('colors.color.show', $color->id ) }}" class="btn btn-info" title="Show Color">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('colors.color.edit', $color->id ) }}" class="btn btn-primary" title="Edit Color">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Color" onclick="return confirm(&quot;Click Ok to delete Color.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div> --}}



    </div>
</div>
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
