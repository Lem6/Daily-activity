        @extends('plan.layouts.admin')
        @section('title','daily plan')
        @section('style')
        <!-- dragula css -->
        <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
        @stop
        @section('content')


        <!-- Start main Content here -->
        <div class="page-content">
        <div class="container-fluid">

        <!-- start page title -->



        <div class="row">
        <div class="col-lg-8">

        @if ($errors->any())
        <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif  
@foreach ( $users as$key =>$user )

@if(count($user->todaytask)>0)
        <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('plan__task.approve.approve') }}" accept-charset="UTF-8" id="create_level_form" name="create_level_form" class="form-horizontal" onSubmit="return checkCriteria{{ $key }}(this)">
            {{ csrf_field() }}
        <div class="media">
        <div class="me-3">
         @if ($user->picture)
        <img src="{{asset('storage/admins/'.$user->picture)}}" alt="" class="avatar-sm rounded-circle img-thumbnail">
        @else
        <div class="avatar-xs">
        <span class="avatar-title rounded-circle bg-primary text-white font-size-21">
        {{ucfirst(Str::limit($user->name, 1,' '))}}
        </span>
        </div>
        @endif
        </div>
      
        <div class="media-body">
        <div class="media">
        <div class="media-body">
        <div class="text-muted">
        <p class="mb-1">{{ $user->name }}</p>
        <h5 class="mb-0">&nbsp;<input class="form-check-input"  type="checkbox" id="checkAll{{ $key }}">&nbsp;&nbsp;&nbsp;Check All</h5>
        </div>

        </div>

        <div class="dropdown ms-2">
        <button type="submit" id="approved_task{{ $key }}"  class="btn btn-success btn-rounded waves-effect waves-light">Approve</button>
        </div>  
        <div class="dropdown ms-2">
        <button type="submit" id="reject_task{{ $key }}"  data-bs-toggle="modal" data-bs-target="#add-{{ $key }}" class="btn btn-danger btn-rounded waves-effect waves-light">&nbsp;Reject&nbsp;</button>
        </div>  
     
        </div>

<div id="errmsg1{{ $key }}"></div>
        <hr>
        <ul class="verti-timeline list-unstyled">
        @foreach ( $user->todaytask as$num =>$todaytask )
        <li class="event-list">
        <div class="event-timeline-dot">
        @if($todaytask->approved_status=='2')
         <i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i>
         @elseif($todaytask->approved_status=='1')
         <i style="color:red" class="fa fa-times-circle" aria-hidden="true"></i>

          @elseif($todaytask->progress=='0')
         <i style="color:red"  class="fa fa-question-circle" aria-hidden="true"></i>
         @else
        <input class="plan{{ $key }} form-check-input"  type="checkbox" value="{{$todaytask->id}}"  name="task[]" id="task{{ $todaytask->id }}">
        @endif
        
        </div>
        <div class="media">
        <div class="me-3">
        <h5 class="font-size-14">
        @if($todaytask->progress=='1')
        <a href="#"   data-bs-toggle="modal"  data-bs-target="#view-{{ $todaytask->id }}"><span class="badge bg-warning">In Progress</span></a>
         @elseif($todaytask->progress=='0')
        <a href="#"   data-bs-toggle="modal"  data-bs-target="#view-{{ $todaytask->id }}"><span class="badge bg-primary">Not Reported</span></a>
        @else
      <span class="badge bg-success">Completed</span> 
        @endif
        @php
            $editstatus=$todaytask->edit_status;
        @endphp
        @if($todaytask->task_type=='0')
        <i class="bx bx-right-arrow-alt font-size-18  {{ $editstatus=='1' ? 'bx-fade-right' : '' }}  text-success align-middle ms-2"></i></h5>
        @else
         <i class="bx bx-right-arrow-alt font-size-18 {{ $editstatus=='1' ? 'bx-fade-right' : '' }}  text-warning align-middle ms-2"></i></h5>
         
        @endif
        </div>
        <div class="media-body">
        <div>
        {{ $todaytask->task_name }} &nbsp;<i style="color:{{ $todaytask->color->color }}" class="bx bx-time font-size-20"></i> 
 
        </div>
        
        </div>
        </div>
        </li>
    
   
 
 {{-- view more modal  --}}
 <div id="view-{{ $todaytask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title"> View Detail</h5>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
          
                                    <div class="form-group mb-3">
                                        <label class="col-form-label"><b><u>Percent</u></b></label>
                                        <div class="col-lg-12">
                                        <div class="progress progress-xl">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $todaytask->percent }}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">{{ $todaytask->percent }}%</div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label"><b ><u>Description</u></b></label>
                                        <div class="col-lg-12">
                                            <p >{{ $todaytask->description }}</p>
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label"><b><u>Challenge</u></b></label>
                                        <div class="col-lg-12">
                                            <p >{{ $todaytask->challenge }}</p>
                                        </div>
                                    </div>
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                           
                                            <button  type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                               
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /view more modal -->
              
      @endforeach
     <div id="add-{{ $key}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Reject Plan </h5>
                                <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Reason for rejection <b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="reject_reason{{ $key }}" required class="reject_reason form-control" name="reject_reason">{{ old('reject_reason') }}</textarea>
                                        </div>
                                    </div>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit"  class="btn btn-primary" id="addtask">Reject Task</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                              
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.reject modal -->
      
        </ul>

        </div>


        </div>
</form>
        </div>
        </div>
@endif

         <script>
        $(document).ready(function(){

                
        $("#checkAll{{ $key }}").click(function () {

        $('.plan'+{{ $key }}).not(this).prop('checked', this.checked);
        });


         $("#approved_task{{ $key }}").click(function () {
   $('.reject_reason').prop("value", "true"); 
    
        });

          $("#reject_task{{ $key }}").click(function () {
   $('.reject_reason').prop("value", ""); 
       
        });

        });


        function checkCriteria{{ $key }}(form) {
               
 var slected="false";
 if($(".plan{{ $key }}:checked").length > 0)
     {
             return true;
    
        
    }
else{
$("#errmsg1{{ $key }}").html('<h5 ><b style="color:red">Select at least one plan !</b></h5 >').show().fadeOut(6666);
return false;
}
   
 
}
        </script>
 @endforeach
        </div>
       

        <div class="col-xl-4 col-lg-6">
        <div class="card">
        <div class="card-header bg-transparent border-bottom">
        <div class="d-flex flex-wrap">
        <div class="me-2">
        <h5 class="card-title mt-1 mb-0">Expert list</h5>
        </div>
        <ul class="nav nav-tabs nav-tabs-custom card-header-tabs ms-auto" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#post-recent" role="tab">
        Planned
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#post-popular" role="tab">
        Un Planned
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#legend" role="tab">
        Legends
        </a>
        </li>
        </ul>
        </div>

        </div>

        <div class="card-body">

        <div data-simplebar style="max-height: 1000px;">
        <!-- Tab panes -->
        <div class="tab-content">
        <div class="tab-pane active" id="post-recent" role="tabpanel">
        <div class="table-responsive">
        <table class="table align-middle table-nowrap">
        <tbody>
        @foreach ( $users as$user )

@if(count($user->todaytask)>0)
        <tr>
        
        <td style="width: 50px;">
          @if ($user->picture)
        <img src="{{asset('storage/admins/'.$user->picture)}}" class="rounded-circle avatar-xs" alt="">
         @else
        <div class="avatar-xs">
        <span class="avatar-title rounded-circle bg-primary text-white font-size-21">
        {{ucfirst(Str::limit($user->name, 1,' '))}}
        </span>
        </div>
        @endif
        </td>


        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">{{ $user->name }}</a></h5></td>
        
        </tr>

      

     @endif
     @endforeach
        </tbody>
        </table>
        </div>
        </div>
        <!-- end tab pane -->

        <div class="tab-pane" id="post-popular" role="tabpanel">

        <div class="table-responsive">
        <table class="table align-middle table-nowrap">
        <tbody>
      @foreach ( $users as$user )

@if(count($user->todaytask)==0)
        <tr>
        
        <td style="width: 50px;">
          @if ($user->picture)
        <img src="{{asset('storage/admins/'.$user->picture)}}" class="rounded-circle avatar-xs" alt="">
         @else
        <div class="avatar-xs">
        <span class="avatar-title rounded-circle bg-primary text-white font-size-21">
        {{ucfirst(Str::limit($user->name, 1,' '))}}
        </span>
        </div>
        @endif
        </td>


        <td><h5 class="font-size-14 m-0"><a href="#" class="text-dark">{{ $user->name }}</a></h5></td>
        
        </tr>

      

     @endif
     @endforeach

   

        </tbody>
        </table>
        </div>
        </div>
        <!-- end tab pane -->

          <div class="tab-pane" id="legend" role="tabpanel">

         <ul class="verti-timeline list-unstyled">
                                            <li class="event-list active">
                                                <div class="event-timeline-dot">
                                                    <input  type="checkbox">
                                                </div>
                                                <div class="media">
                                                    
                                                    <div class="media-body">
                                                        <div>
                                                            un read
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list active">
                                                <div class="event-timeline-dot">
                                                   <i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media">
                                                    
                                                    <div class="media-body">
                                                        <div>
                                                            Approved
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list ">
                                                <div class="event-timeline-dot">
                                                  <i style="color:red"  class="fa fa-question-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                          not Reported
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list ">
                                                <div class="event-timeline-dot">
                                                   <i style="color:red" class="fa fa-times-circle" aria-hidden="true"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                           Rejected
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                   <i class="bx bx-right-arrow-alt font-size-18    text-success align-middle ms-2"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                            Planed
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                   <i class="bx bx-right-arrow-alt font-size-18    text-warning align-middle ms-2"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                           Out of  Plan
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                   <i class="bx bx-right-arrow-alt font-size-18  bx-fade-right   text-success align-middle ms-2"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                           Modified plan
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                 @foreach ($colors as $color)
                                     <li class="event-list">
                                                <div class="event-timeline-dot">
                                                 <i style="color:{{ $color->color }}" class="bx bx-time font-size-20"></i> 
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                          {{$color->name}}  
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                 @endforeach


                                        </ul>
        </div>
        <!-- end tab pane -->
        </div>
        <!-- end tab content -->
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- end row -->










        </div> <!-- container-fluid -->
        </div>



        <!-- end main content-->



        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
        @section('script')

        <!-- Ion Range Slider-->
        <script src="{{ asset('admin/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

        <!-- Range slider init js-->
        <script src="{{ asset('admin/js/pages/range-sliders.init.js')}}"></script>
        @stop