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

                                       <!-- <div class="row mb-4">
                                                        <h4 class="card-title mb-4">Date Interval </h4>
                                                <div class="col-lg-12">
                                                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker" data-date-format="dd M, yyyy"  data-date-container='#project-date-inputgroup' data-date-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Start Date"name="from_date" id="from_date"  />
                                                        <input type="text" class="form-control" placeholder="End Date" name="to_date" id="to_date" />
                                                    </div>
                                                </div>
                                            </div> -->

                                             <div class="row">
      <!-- <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div> -->
      <div class="col-lg-10">
          
       <div class="input-group input-daterange" data-date-container='#project-date-inputgroup' data-date-autoclose="true" >
           <input type="text" name="from_date"  placeholder="Start Date" id="from_date" readonly class="form-control" />
         
           <input type="text"  name="to_date"  placeholder="End Date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-lg-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Timeline</h4>

                             

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        
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

                          <div class="row">


                            <div class="col-lg-8">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dt-responsive  nowrap w-100"  id="datatable">
                                            <thead>
                                                <tr>
                                                    
                                                     <th scope="col">#</th>
                                                    <th scope="col">Daily Task</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                  
                                                    <th scope="col">Color </th>
                                                </tr>
                                            </thead>
                                            <tbody name="tabelplan" id="tabelplan"  >
                                                <tr  data-bs-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                                                 
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">planed</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                   
                                                    <td>
                                                        <button  type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                               
                                                    <tr class="collapse hidden" id="collapseExample" >
                                                        
                                                   <td colspan="6"  ><div id="demo3" >Demo3 sdhahdv havoha vehfo heofh ehfoheofh oehfo heohf oehfoheof oeh</div></td>
                                                   </tr>

                                                     <td>2</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">out of plan</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-primary">In progress</span></td>
                                                   
                                                    <td>
                                                       <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                                    <tr>
                                               
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">out of plan</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                   
                                                    <td>
                                                           <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                   
                                                     <td>Amare Yohhanes</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="#" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental <span class="bg-warning badge me-2">planed</span></p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-danger">no progress</span></td>
                                                   
                                                    <td>
                                                     <button type="button" class="btn btn-outline-warning waves-effect waves-light">Detail</button>
                                                    </td>
                                                </tr>
                                            </tbody>

                                         
                                        </table>
                                          {{ csrf_field() }}
                                             {!! $activities->render() !!}
                                              
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                 
                                <div class="row">
                                @if($colors)
                                    @foreach ($colors as $color)
                                    
                                   
                                    
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">{{ $color->color }}</p>
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
                                  
                                    @endforeach
                                   @endif
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center my-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a>
                                </div>
                            </div> <!-- end col-->
                        </div>

                    </div> <!-- container-fluid -->


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

     
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

fetch_data()

 function fetch_data(from_date = '', to_date = '')
 {
 
  $.ajax({
     
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
  //console.log(data);
    // var output = '';
    // $('#total_records').text(data.length);
    // for(var count = 0; count < data.length; count++)
    // {
    //  output += '<tr>';
    //  output += '<td>' + data[count].task_name + '</td>';
    //  output += '<td>' + data[count].task_name + '</td>';
    //  output += '<td>' + data[count].task_name + '</td></tr>';
    // }
    $('#tabelplan').html(data);
          paginate();
   },
   error:function(data){
console.log('there is error in ajx requerst ')
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
    $.ajax({
     
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {

    // var output = '';
    console.log(data)
    // $('#total_records').text(data.length);
    // for(var count = 0; count < data.length; count++)
    // {
    // output += '<tr>';
    //  output += '<td>' + data[count].task_name + '</td>';
    //  output += '<td>' + data[count].task_name + '</td>';
    //  output += '<td>' + data[count].task_name + '</td></tr>';
    // }
    $('#tabelplan').html(data);
        paginate();
   },
   error:function(data){
console.log('there is error in ajx requerst ')
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
  fetch_data();
 });


});
</script>
@stop

 function fetch_date(Request $request)    {

     if($request->ajax()){

         if(Auth::user()->hasRole('director')){
               $expert_id = $request->expert_id;
         $id = $expert_id;
        $req_id=Auth::user()->id;
        $users = DirectorUser::where('user_id',$req_id)->first();

        $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
        ->where('director_members.directorate_id','=', $users->directorate_id)
        ->select('director_members.*','users.*')->get();


        $data =  Plan_Task::with('color')->where('user_id', $id)->whereDate('created_at', Carbon::today())->get();
        $user = User::find($id);

    
          }
      if($request->from_date != '' && $request->to_date != '' && $request->expert_id != '')  {
     $start = date("Y-m-d",strtotime($request->input('from_date')));
    $end = date("Y-m-d",strtotime($request->input('to_date')));
    $expert_id = $request->expert_id;
    $data =  Plan_Task::with('color')->where('user_id',$expert_id)->whereBetween('created_at',[$start,$end])->get();
      }
      else {
      $expert_id = $request->expert_id;
       $data =  Plan_Task::with('color')->where('user_id',$expert_id)->whereDate('created_at', Carbon::today())->get();
      }

$startDate = new \DateTime($start);
$endDate = new \DateTime($end);
$ends = $endDate->modify('+1 day');

$interval = \DateInterval::createFromDateString('1 day');
$period = new \DatePeriod($startDate, $interval, $ends);
   $output="";
   $output1="";
   $output2="";
   $output3="";
      $count4 = 0;

foreach ($period as $date) {

    foreach($data as $singledata){
$endDate1 = new \DateTime($singledata->updated_at);
//    $endDate2  =   date('d-m-Y', $singledata->updated_at);
    $output1 =date('Y-m-d', $singledata->updated_at->timestamp); 

     $output2 = $date->format('Y-m-d');
    


    }



//   $datex =  $date->format(\DateTime::ATOM);
}
    //   $output="";
    //   $count = 0;


    return view('plan.activities.director',compact('director_members','data','user','id') );

     }
    }