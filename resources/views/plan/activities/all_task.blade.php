
 @foreach ($period as $date)
 <?php
 $ldate = date('Y-m-d');
 $fdate =  $date->format('Y-m-d');
 ?>
 @if (in_array($date->format('N'), [6,7])  || $fdate >  $ldate )
 
 
 @else  
            
 <div class="card">
     <div class="card-body">
 <div class="row">
                         <div class="card">
                                     <div class="card-body">
                                         <div class="media">
                                             <div class="me-3">
                                                 <h4  >
                                            <?php
 
                                            $fdate =  $date->format('F j, ');
 
                             echo $fdate   ?>
                                                 </h4>
                                             </div>
                                             <div class="media-body align-self-center">
                                                 <div class="text-muted">
                                                     <!-- <h5> {{$user->name}}{{$user->last_name}}</h5>
                                                     <p class="mb-1">{{$user->email}}</p> -->
                                                     <p class="mb-0"></p>
                                                 </div>
                                             </div>
                                             {{-- <div class="dropdown">
                                                 <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-wallet me-1"></i> <span class="d-none d-sm-inline-block">View Detail <i class="mdi mdi-chevron-down"></i></span></button>
 
                                             </div> --}}
                                         </div>
                                     </div>
                         </div>
                     </div>
 
  <div class="table-responsive">
                                             <table class="table table-nowrap align-middle mb-0">
                                                 <tbody>
 
 
 <?php $counter = 1 ?>
                                                           @foreach ($data as  $indexKey=> $planTask )
 
 <?php
 $fdate =  $date->format('Y-m-d');
 $output1 =date('Y-m-d', $planTask->updated_at->timestamp);
 ?>
 @if($fdate ==$output1 )
                                                           @if($planTask->progress == 1)
                                                     <tr data-bs-toggle="collapse" href="#collapseExample{{$planTask->id}}" aria-expanded="true" aria-controls="collapseExample{{$planTask->id}}" >
                                                         @else
                                                         <tr>
                                                             @endif
                                                         <td style="width: 40px;">
                                                             <div class="form-check font-size-16">
 
                                                                 <label class="form-check-label" for="upcomingtaskCheck01">{{$counter++}} </label>
                                                             </div>
                                                         </td>
 
                                                         <td>
                                                                                                             <div class="event-timeline-dot" style="color:{{$planTask->color->color}}">
                                                     <i class="bx bx-right-arrow-circle font-size-18"></i>
                                                 </div>
                                                             <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark"> {{$planTask->task_name}} </a></h5>
                                                                           @if($planTask->task_type == 0)
                                                               <p class="text-muted mb-0"><span class="bg-warning badge me-2">planed</span></p>
                                                               @elseif($planTask->task_type == 1)
                                                                                                  <span class="bg-warning badge me-2">out of plan</span></p>
                                                                                                   @endif
                                                         </td>
                                                    @if($planTask->progress == 0)
                                                         <td>
                                                             <div class="text-center">
                                                             <span class="badge  bg-danger rounded-pill badge-soft-secondary-danger font-size-11">No Progress</span>
                                                             </div>
                                                         </td>
 
                                                           @elseif($planTask->progress == 1)
 
                                                          <td>
                                                             <div class="text-center">
                                                             <span class="badge  bg-primary rounded-pill badge-soft-secondary-primary font-size-11">Progress</span>
                                                             </div>
                                                         </td>
 
                                                         @elseif($planTask->progress == 2)
 
                                                          <td>
                                                             <div class="text-center">
                                                             <span class="badge  bg-sucess rounded-pill badge-soft-secondary-sucess font-size-11">Completed</span>
                                                             </div>
                                                         </td>
 
 
 
 
                                                         @endif
                                                     </tr>
                                                                     @if($planTask->progress == 1)
                                                      <tr class="collapse hidden" id="collapseExample{{$planTask->id}}" >
 
                                                    <td colspan="6"  ><div id="demo3" >{{$planTask->description}}</div></td>
                                                    </tr>
                                                         @endif
 
 
 
 
                                                        @endif
                                                          @endforeach
 
                                                                @if (!$data->contains('created_at', $date))
                                                 <div class="table-responsive">
                                             <table class="table table-nowrap align-middle mb-0">
                                                 <tbody>
                                                           <td>
                                                             <div class="text-center">
                                                              <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">No Plan</a></h5>
                                                             </div>
                                                         </td>
 </tbody>
                                                             </table>
 
 
                                         </div>
                                                 @endif
                                                 </tbody>
                                                        {{ csrf_field() }}
                                             </table>
 
 
                                         </div>
                                     </div>
                                 </div>
                              
 
 
   @endif
 @endforeach
 
 