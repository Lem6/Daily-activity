
 @foreach ($period as $date)
<?php
$ldate = date('Y-m-d');
$fdate =  $date->format('Y-m-d');
?>
@if (in_array($date->format('N'), [6,7])  || $fdate >  $ldate )
  <!-- <div class="table-responsive">
                                            <table class="table table-nowrap align-middle mb-0">
                                                <tbody>
                                                          <td>
                                                            <div class="text-center">
                                                             <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">WeekEnd</a></h5>
                                                            </div>
                                                        </td>
</tbody>
                                                            </table>


                                        </div> -->

@else
     <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">    <?php

                                           $fdate =  $date->format('F j, ');

                            echo $fdate   ?></h4>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                            <tbody>







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

                                                                <label class="form-check-label" for="upcomingtaskCheck01">{{$indexKey+1}} </label>
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


                                                       @else
                                                   <?php
                                                   $flag = False
                                                   ?>
                                                       @endif
                                                         @endforeach
                                                </tbody>
                                                       {{ csrf_field() }}
                                            </table>


                                        </div>
                                         </div>
                                          </div>



  @endif
                                            @endforeach
