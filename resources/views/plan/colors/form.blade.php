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

    <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Score Card Setting </h4>
                                        <p class="card-title-desc">color range setting according to the plaing time </p>



                                        <div class="mb-3 row  {{ $errors->has('planing_time') ? 'has-error' : '' }}">
                                            <label for="example-time-input" class="col-md-2 col-form-label">Planing Time <b style="color:red">*</b> </label>
                                            <div class="col-md-10">

                                                   <input class="form-control" name="plan_start_time" type="time" id="planing_time" value="{{ old('plan_start_time', optional($color)->plan_start_time) }}"  placeholder="Enter planing time here...">
        {!! $errors->first('planing_time', '<p class="help-block">:message</p>') !!}



                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Plan Ending Time <b style="color:red">*</b> </label>
                                           <div class="col-md-10">
                                              <input class="form-control" name="plan_end_time" type="time"  id="reporting_time" value="{{ old('plan_end_time', optional($color)->plan_end_time) }}" minlength="1" placeholder="Enter reporting time here...">
        {!! $errors->first('reporting_time', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
   <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Progress Start-Time </label>
                                          <div class="col-md-10">
                                              <input class="form-control" name="progress_start_time" type="time" id="progress_start_time" value="{{ old('progress_start_time', optional($color)->progress_start_time) }}" minlength="1" placeholder="Enter reporting time here...">
        {!! $errors->first('reporting_time', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Edit Time <b style="color:red">*</b> </label>
                                      <div class="col-md-10">
                                              <input class="form-control" name="edit_time" type="text" id="edit_time" value="{{ old('edit_time', optional($color)->edit_time) }}" minlength="1" placeholder="Enter editing time for plan   ...">
        {!! $errors->first('reporting_time', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                           <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Color <b style="color:red">*</b> </label>


                                            <div class="col-md-10">
                                                    <div>
                                                <label class="form-label">Show Input And Initial</label>
                                                <input type="text" class="form-control" name="color" id="colorpicker-showinput-intial" value="{{ old('color', optional($color)->color) }}">
                                            </div>
                                                    {{-- <input class="form-control" name="color" type="color" id="color" value="{{ old('color', optional($color)->color) }}" minlength="1" placeholder="Enter color here..."> --}}
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}


                                            </div>
                                        </div>

                                          <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Description <b style="color:red">*</b> </label>
                                      <div class="col-md-10">
                                              <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($color)->name) }}" minlength="1" placeholder="Enter descriptiom...">
        {!! $errors->first('reporting_time', '<p class="help-block">:message</p>') !!}
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
