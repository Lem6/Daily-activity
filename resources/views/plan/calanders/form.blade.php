
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
                     <div class="mb-3 row {{ $errors->has('task_name') ? 'has-error' : '' }}">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Activity Name <b style="color:red">*</b></label>
                                           <div class="col-md-5">
                                           @if($calander)
                                              <input type="hidden" name="user" value="{{ $calander->users }}">
                                              @endif
                                              <input class="form-control" name="task_name" required autocomplete="off" type="text" id="task_name" value="{{ old('task_name', optional($calander)->task_name) }}" minlength="1" placeholder="Enter activity name here...">
        {!! $errors->first('activity_name', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>


    <div class="mb-3 row  {{ $errors->has('created_at') ? 'has-error' : '' }}">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Date <b style="color:red">*</b></label>
                                           <div class="col-md-5">
                                                 {{-- <input class="form-control"  name="date"  type="date-local"value="{{ old('date', optional($calander)->date) }}"
                                                > --}}
                                            <div class="input-group" id="datepicker2">
                                                    <input type="text" name="date" required autocomplete="off" class="form-control" placeholder="dd M, yyyy"
                                                        data-date-format="dd M, yyyy" value="{{ old('date', optional($calander)->created_at) }}" data-date-container='#datepicker2' data-provide="datepicker"
                                                        data-date-autoclose="true">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
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



