@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('admin/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

                <div class="page-content">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Legends !</h5>
                                                    <a>&nbsp;&nbsp;<i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp; Approved by team leader</a>
                                                     <ul class="verti-timeline list-unstyled">
                                            <li class="event-list active">
                                                <div class="event-timeline-dot">
                                                    <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                            Rejected by team leader
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
 
                                        </ul> 
                                         
                                         
                                                </div>
                                            
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                @if($colors)
                                    @foreach ($colors as $color)
                                    
                                   
                                    <div class="col-md-{{12/count($colors) }}">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">{{ $color->name }}</p>
                                                        <p class="mb-0">{{ $color->plan_start_time }} - {{ $color->plan_end_time }}</p>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-danger">
                                                            <span class="avatar-title" style="background-color:{{ $color->color }}">
                                                                <i class="bx bx-time font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   @endif
                                   
                                    </div>

                                    </div>
                                </div>
                                <!-- end row -->

                                
                        <div class="row">

                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Daily Plan</h4>

                                    <div class="page-title-center">
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
   <div class="row">
                           <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">To do List</h4>

                                          @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
                                        <ul class="verti-timeline list-unstyled">
                                        
                                  @foreach ($planTasks->where('progress','0') as $planTask )
                                      
                                 
                                            <li class="event-list" >
                                                <div class="event-timeline-dot" style="color:{{$planTask->color->color}}">
                                                    <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                </div>
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                       
                                            
                                                           {{$planTask->task_name}}
                                                        </div>
                                                    </div>
                                                     <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                             @php
                                                            $ptime=strtotime($planTask->planing_time.' + '.$planTask->color->edit_time.' minute');
                                                        @endphp
                                                                         @if($ptime>=$time)
                                                                 @can('edit_plan')
                                                                <a class="dropdown-item edittask-details" href="#"  data-bs-toggle="modal" data-bs-target="#edit-{{ $planTask->id }}">Edit</a>
                                                                @endcan
                                                                @can('delete_plan')
                                                                <a style="color:red" class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#delete-{{ $planTask->id }}">Delete</a>
                                                                @endcan
                                                                @else
                                                                 <a class="dropdown-item edittask-details" href="#"  data-bs-toggle="modal" data-bs-target="#progress-{{ $planTask->id }}">In Progres</a>
                                                                <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#complete-{{ $planTask->id }}">Complete</a>
                                                            @endif
                                                            </div>
                                                        </div> 
                                                </div>
                                            </li>



                                           @endforeach 

                                        </ul>
                                        <br>
                                   <div class="text-center d-grid">
                                                <a href="#" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target="#add" ><i class="mdi mdi-plus me-1"></i> Add Task</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">In progress</h4>
                                        <ul class="verti-timeline list-unstyled">
                                            @foreach ($planTasks->where('progress','1') as $planTask )
                                             @if($planTask->approved_status=="1")
                                            
                                             <li class="event-list active">
                                                <div class="event-timeline-dot" >

                                                     <a href="#" data-bs-toggle="modal" data-bs-target="#reject-{{ $planTask->id }}"><i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i></a>

                                                </div>
                                            @else
                                            <li class="event-list">
                                                <div class="event-timeline-dot" style="color:{{$planTask->color->color}}">

                                                    <i class="bx bx-right-arrow-circle font-size-18 "></i>

                                                </div>
                                            @endif



                                               <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                       
                                            
                                                           {{$planTask->task_name}}
                                                             @if($planTask->approved_status!='0')
         <i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i>
         @endif
                                                        </div>
                                                    </div>
                                                      
                                                     <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                              
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                        
                                                                @php
                                                            $ptime=strtotime($planTask->progress_time.' + '.$planTask->color->edit_time.' minute');
                                                        @endphp
                                                                         @if($ptime>=$time || $planTask->approved_status=='1')
                                                              <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#ongoing-{{ $planTask->id }}">Ongoing</a>
                                                                <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#complete-{{ $planTask->id }}">Complete</a>
                                                            @endif
                                                            <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#view-{{ $planTask->id }}">View More</a>
                                                            @if($planTask->approved_status=='1')
                                                            <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#edit-progress-{{ $planTask->id }}">Edit</a>
                                                            @endif
                                                            </div>
                                                          
                                                        </div> 
                                                          
                                                </div>
                                            </li>
                                            

                
                                            @endforeach
                                        </ul>
                                          <br>
                                   {{-- <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add Task</a>
                                            </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Completed</h4>
                                        <ul class="verti-timeline list-unstyled">
                                            @foreach ($planTasks->where('progress','2') as $planTask )
                                      
                                 
                                             @if($planTask->approved_status=="1")
                                            
                                             <li class="event-list active">
                                                <div class="event-timeline-dot" >

                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#reject-{{ $planTask->id }}"><i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i></a>

                                                </div>
                                            @else
                                            <li class="event-list">
                                                <div class="event-timeline-dot" style="color:{{$planTask->color->color}}">

                                                    <i class="bx bx-right-arrow-circle font-size-18 "></i>

                                                </div>
                                            @endif
                                                <div class="media">
                                                   
                                                    <div class="media-body">
                                                        <div>
                                                       
                                            
                                                           {{$planTask->task_name}}
                                                           @if($planTask->approved_status!='0')
         <i style="color:green" class="fa fa-check-circle" aria-hidden="true"></i>
         @endif
                                                        </div>
                                                    </div>
                                                     @php
                                                            $ptime=strtotime($planTask->progress_time.' + '.$planTask->color->edit_time.' minute');
                                                        @endphp
                                                                         @if(($ptime>=$time || $planTask->approved_status=='1') && $planTask->task_type=="0"   )
                                                     <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                           
                                                                <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#ongoing-{{ $planTask->id }}">Ongoing</a>
                                                                 <a class="dropdown-item edittask-details" href="#"  data-bs-toggle="modal" data-bs-target="#progress-{{ $planTask->id }}">In Progres</a>
                                                                
                                                          
                                                            </div>
                                                        </div> 
                                                            @elseif(($ptime>=$time || $planTask->approved_status=='1') && $planTask->task_type=="1"   )
                                                     <div class="dropdown float-end">
                                                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                            </a>
                                                            
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('edit_plan')
                                                                <a  class="dropdown-item edittask-details" href="#"   data-bs-toggle="modal" data-bs-target="#edit-{{ $planTask->id }}">Edit</a>
                                                                @endcan
                                                                @can('delete_plan')
                                                                 <a class="dropdown-item edittask-details" href="#"  data-bs-toggle="modal" data-bs-target="#delete-{{ $planTask->id }}">Delete</a>
                                                                @endcan
                                                          
                                                            </div>
                                                        </div> 
                                                        @endif
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                           <br>
                                   <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target="#outplan" ><i class="mdi mdi-plus me-1"></i> Out of plan</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

  @foreach ($planTasks as $planTask )
  {{-- edit progress modal  --}}
 <div id="edit-progress-{{ $planTask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title"> Edit Progress</h5>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <form method="POST" action="{{ route('plan__tasks.plan__task.inprogress', $planTask->id) }}" id="edit_plan__task_form" name="edit_plan__task_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
          
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Percent<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <input id="range_0122"  value="{{ old('percent', optional($planTask)->percent) }}"class="range_01 form-control" name="percent">
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label">Description<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name" required class="form-control" name="description">{{ old('description', optional($planTask)->description) }}</textarea>
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label">Challenge</label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name"  class="form-control" name="challenge">{{ old('challenge', optional($planTask)->challenge) }}</textarea>
                                        </div>
                                    </div>
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Save Change</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /edit progress modal -->

  {{-- reject reason modal  --}}
 <div id="reject-{{ $planTask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Rejection  Reason</h5>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
                                    <div class="form-group mb-3">
                                        <label class="col-form-label"><b>Rejection  Reason</b></label>
                                        <div class="col-lg-12">
                                            <p >{{ $planTask->reject_reason }}</p>
                                        </div>
                                    </div>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                              
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
{{-- reject reason modal --}}
{{-- edit modal  --}}
 <div id="edit-{{ $planTask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Edit  Task</h5>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <form method="POST" action="{{ route('plan__tasks.plan__task.update', $planTask->id) }}" id="edit_plan__task_form" name="edit_plan__task_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Task Name<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name" required class="form-control" name="task_name">{{ old('task_name', optional($planTask)->task_name) }}</textarea>
                                        </div>
                                    </div>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Create Task</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
{{-- edit modal --}}
                                            {{-- delete modal --}}
                     <div id="delete-{{ $planTask->id }}"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" >
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title" style="color:red">Delete Plan</h5>
                             
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                     					
                             <form method="POST" action="{!! route('plan__tasks.plan__task.destroy', $planTask->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                                   <h3>Are You Sure ?</h3>
                                   	<p>Do you really want to delete these plan? This process can not be undone.</p>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-danger" id="addtask">Delete</button>
                                            <button type="button" class="btn btn-warning "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.dlete modal -->


         {{-- ongoing modal --}}
                     <div id="ongoing-{{ $planTask->id }}"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" >
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title" >Completed Plan</h5>
                             
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                     					
                             <form method="get" action="{!! route('plan__tasks.plan__task.ongoing', $planTask->id) !!}" accept-charset="UTF-8">
           
            {{ csrf_field() }}
                                   <h3>Are You Sure ?</h3>
                                   	<p>Do you really Undo this plan?</p>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Yes</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">No</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.ongoing modal -->


                               {{-- complete modal --}}
                     <div id="complete-{{ $planTask->id }}"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" >
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title" >Completed Plan</h5>
                             
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                     					
                             <form method="get" action="{!! route('plan__tasks.plan__task.completed', $planTask->id) !!}" accept-charset="UTF-8">
           
            {{ csrf_field() }}
                                   <h3>Are You Sure ?</h3>
                                   	<p>Do you really completed this plan?</p>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Yes</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">No</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.complete modal -->
{{-- progress modal  --}}
 <div id="progress-{{ $planTask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title"> Task Progress</h5>
                           
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <form method="POST" action="{{ route('plan__tasks.plan__task.inprogress', $planTask->id) }}" id="edit_plan__task_form" name="edit_plan__task_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
          
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Percent<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <input id="range_0122"    class="range_01 form-control" name="percent">
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label">Description<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name" required class="form-control" name="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label">Challenge</label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name"  class="form-control" name="challenge">{{ old('challenge') }}</textarea>
                                        </div>
                                    </div>
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Submit</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /in progress modal -->


                {{-- view more modal  --}}
 <div id="view-{{ $planTask->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
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
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $planTask->percent }}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">{{ $planTask->percent }}%</div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label"><b ><u>Description</u></b></label>
                                        <div class="col-lg-12">
                                            <p >{{ $planTask->description }}</p>
                                        </div>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="col-form-label"><b><u>Challenge</u></b></label>
                                        <div class="col-lg-12">
                                            <p >{{ $planTask->challenge }}</p>
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

                
<div id="outplan" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Add Task</h5>
                                <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <form method="POST" action="{{ route('plan__tasks.plan__task.outplan') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
                                   
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Task Name<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name" required class="form-control" name="task_name">{{ old('task_name') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Assigned By<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <input id="task_name" required class="form-control" value="{{ old('given_by') }}" name="given_by">
                                        </div>
                                    </div>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Create Task</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.out of plan modal -->
                <div id="add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Add Task</h5>
                                <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <form method="POST" action="{{ route('plan__tasks.plan__task.store') }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
                                   
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Task Name<b style="color:red">*</b></label>
                                        <div class="col-lg-12">
                                            <textarea id="task_name" required class="form-control" name="task_name">{{ old('task_name') }}</textarea>
                                        </div>
                                    </div>
                                    
                

                                    
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask">Create Task</button>
                                            <button type="button" class="btn btn-danger "  data-bs-dismiss="modal" id="updatetaskdetail">close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                

            

                 
                

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->



@endsection

@section('script')
  
    <!-- Ion Range Slider-->
        <script src="{{ asset('admin/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

        <!-- Range slider init js-->
        <script src="{{ asset('admin/js/pages/range-sliders.init.js')}}"></script>
@stop