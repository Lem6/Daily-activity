@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@stop
@section('content')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                    <!-- end page title -->
   <div class="row">
                            <div class="col-12">

                                       <div class="row mb-4">
                                                        <h4 class="card-title mb-4">Date Interval </h4>
                                       <input type="hidden" id="custId" name="custId" value="{{$user->id}}">
                                                <div class="col-lg-10">
                                                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Start Date" name="from_date" id="from_date" />
                                                        <input type="text" class="form-control" placeholder="End Date"  name="to_date" id="to_date" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
                                            </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xl-4">
                            <a href="{{ route('expert.profile',$user->id) }}">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">

                                                <div class="text-primary p-3">

                                                   <h5 class="text-primary">{{$user->name}}</h5>
                                                    <p>{{$user->email}}</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                </div>
 </a>
                            </div>

                            <div class="col-xl-8" id="color">

@include('plan.activities.color_count_team')
                                    </div>
                                </div>
                    <div class="row">


                        <div class="col-lg-8" id="cardinfo">

                            <div class="card">
                                <div class="card-body"  >
                                    <h4 class="card-title mb-4">  <?php
                                    echo date("F j,  ")."<br>"; ?></h4>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap align-middle mb-0">
                                                 <tbody>

                                                          @foreach ($data as  $indexKey=> $planTask )

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


                                                         @endforeach
                                                </tbody>
                                                       {{ csrf_field() }}
                                        </table>
                                    </div>
                                </div>
                            </div>






                        </div>
                        <!-- end col -->

                           <div class="col-lg-4">


                                <div class="card">
                                    <div class="card-body">




                                        <h4 class="card-title mb-4">Expert List</h4>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>

                                                      <tbody>
                                                @if($director_members->count())
                                                @foreach($director_members as$key  =>$member)
                                                <tr>

                                                    <td>

                                                                            <div class="avatar-xs">
                                                                            <span class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                                                {{ucfirst(Str::limit($member->name, 1,' '),)}}
                                                                            </span>
                                                                        </div>
                                                    </td>
                                                    <td> <a style="color:black" href="{{route('daterange.teamleader', Crypt::encrypt($member->id) )}}">{{$member->name}}</a></td>






                                                </tr>
                                                @endforeach

                                                @endif
                                            </tbody>



                                                </tbody>
                                            </table>

                            </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


                  @endsection

@section('script')
  <!-- dragula css -->
  <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
          <!-- Responsive examples -->

                  <!-- Required datatable js -->
        <script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('admin/ibs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>


        <script src="{{ asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('admin/js/pages/datatables.init.js')}}"></script>
<script>
var _token = $('input[name="_token"]').val();

    $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');

  console.log('hello')
 });

  $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
   var expert_id = $('#custId').val();
   console.log(expert_id)
  if(from_date != '' &&  to_date != '')
  {
    $.ajax({

   url:"{{ route('daterange.fetch_date') }}",
   method:"GET",
   data:{from_date:from_date, to_date:to_date,expert_id:expert_id, _token:_token, },
   dataType:"json",
   success:function(data)
   {

    // var output = '';

$("#cardinfo").empty();
$('#cardinfo').html(data.html);

$("#color").empty();
$('#color').html(data.count_color);

   },
   error:function(xhr, ajaxOptions, thrownError){
 alert(xhr.status);
   }
  })
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
     var expert_id = $('#custId').val();
  $.ajax({

   url:"{{ route('daterange.fetch_date') }}",
   method:"GET",
   data:{expert_id:expert_id, _token:_token, },
   dataType:"json",
   success:function(data)
   {

    // var output = '';

$("#cardinfo").empty();
$('#cardinfo').html(data.html);


   },
   error:function(xhr, ajaxOptions, thrownError){
 alert(xhr.status);
   }
  })
 });


    </script>

@stop
