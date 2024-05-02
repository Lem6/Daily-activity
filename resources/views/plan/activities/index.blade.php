@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<style>
.counter{
    color: #444;
    font-family: 'Poppins', sans-serif;
    text-align: center;
}
.counter .counter-value{
    color: #fff;
    font-size: 33px;
    font-weight: 600;
    line-height: 128px;
    height: 140px;
    width: 140px;
    margin: 0 auto 10px;
    border-radius: 50% 0 50% 50%;
    border: 7px solid #FF2B08;
    border-right-color: transparent;
    display: block;
    position: relative;
    z-index: 1;
}
.counter .counter-value:before{
    content: '';
    background: linear-gradient(to right bottom,#FF2B08,#FE9C04);
    border-radius: 50%;
    box-shadow: 0 0 10px -3px rgba(0,0,0,0.5);
    position: absolute;
    left: 6px;
    top: 6px;
    bottom: 6px;
    right: 6px;
    z-index: -1;
}
.counter h3{
    color: #555;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    margin: 0;
}
.counter.purple .counter-value{
    border-color: #6101E5;
    border-right-color: transparent;
}
.counter.purple .counter-value:before{
    background: linear-gradient(to right bottom,#6101E5,#9F27E8);
}
.counter.blue .counter-value{
    border-color: #0284F3;
    border-right-color: transparent;
}
.counter.blue .counter-value:before{
    background: linear-gradient(to right bottom,#0284F3,#1DC0E1);
}
.counter.pink .counter-value{
    border-color: #435CF8;
    border-right-color: transparent;
}
.counter.pink .counter-value:before{
    background: linear-gradient(to right bottom,#435CF8,#FF4674);
}
@media screen and (max-width:990px){
    .counter{ margin-bottom: 40px; }
}
</style>
@stop
@section('content')

 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->


                  <div class="page-content">
                    <div class="container-fluid">
<div class="card">
                                        <div class="card-body">
                                    <div class="row">
                            <div class="col-12">
<form method="POST" action="/generate-pdf" accept-charset="UTF-8" >
            {{ csrf_field() }}
                                       <div class="row mb-4">
                                                        <h4 class="card-title mb-4">Date Interval </h4>
                                                        <input type="hidden" id="custId" name="custId" value="{{$user->id}}">
                                                <div class="col-lg-9">
                                                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                                        <input type="text" class="form-control" required placeholder="Start Date" autocomplete="off" name="from_date" id="from_date" />
                                                        <input type="text" class="form-control" required placeholder="End Date" autocomplete="off"  name="to_date" id="to_date" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
        <button type="submit" name="print" id="refresh" class="btn btn-success btn-sm">Print</button>
      </div>
                                            </div>
</form>

                            </div>
                        </div>
  </div>
                        </div>

<div class="card">
                                        <div class="card-body">

    <div class="row" id="planing_day">

     @include('plan.activities.plan_day')
    </div>

    </div>

    </div>



                        <div class="row">
                            <div class="col-12">

                                       <div class="row mb-4">

                                                <div class="col-lg-10">
                                                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">

                                                    </div>
                                                </div>



                                                </div>
                                            </div>
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">




                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                                         <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Activity List</h4>

                                    <div class="page-title-right">

                                    </div>

                                </div>
                            </div>
                        </div>

                          <div class="row" >


                                <div class="col-lg-7" name = 'cardinfo' id="cardinfo">

                                    <div class="card">
                                        <div class="card-body">
                                                    <div class="row">

                                                 <div class="card" >
                                                      <div class="card-body">
                                                <div class="media">
                                                <div class="me-3">
                                                        <h4  >


                                                <?php echo date('F j, ');?>


                                                        </h4>
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="text-muted">
                                                            <h5> {{$user->name}}{{$user->last_name}}</h5>
                                                            <p class="mb-1">{{$user->email}}</p>
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
                                                <div class="table-responsive" name='tasklist' id='tasklist'>
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
                                    <div class="col-lg-5"  id="color">

                                    @include('plan.activities.color_count')
                                    </div>
                            </div>

                        <!-- end row -->



                    </div> <!-- container-fluid -->


@endsection

@section('script')

  <!-- dragula css -->
    <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>




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

$("#color").empty();planing_day
$('#color').html(data.totalcolor);

$("#planing_day").empty();
$('#planing_day').html(data.plandays);

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


// function getdate(page){
//     var from_date = $('#from_date').val();
//   var to_date = $('#to_date').val();
//    var expert_id = $('#custId').val();
//    console.log(expert_id)

//     $.ajax({

//    url: '?page=' + page,
//    method:"GET",
//    dataType:"html",
//    success:function(data)
//    {

//   $("#tag_container").empty().html(data);
//             location.hash = page;
//     // var output = '';
//     console.log(data)
//     console.log('it works ')

// $('#tasklist').html(data.html);

//    },
//    error:function(xhr, ajaxOptions, thrownError){
//  alert(xhr.status);
//    }
//   })


// }
$(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});

    </script>




@stop
