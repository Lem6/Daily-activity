@extends('plan.layouts.admin')
@section('title','daily plan')
@section('style')
  <!-- dragula css -->
  <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


@stop
@section('content')
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">System Development Team</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                {{--  <h5 class="font-size-15 text-truncate">Cynthia Price</h5>  --}}
                                                {{-- <p class="text-muted mb-0 text-truncate">System Designer</p> --}}
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">12</h5>
                                                            <p class="text-muted mb-0">PROJECTS</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">25</h5>
                                                            <p class="text-muted mb-0">Team Members</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->


                                <!-- end card -->

                                <div>

                            </div>

                                <!-- end card -->
                            </div>

                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body"style="background: #b9b4b4";>
                                                <div class="media" >
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium mb-2">Activites </p>
                                                        <h4 class="mb-0">{{$today}}</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body"style="background: #b9b4b4";>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium mb-2">Planed Expert</p>
                                                        <h4 class="mb-0">{{$todayexpert}}</h4>
                                                    </div>

                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body" style="background: #b9b4b4";>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium mb-2">No Plan Experts</p>
                                                        <h4 class="mb-0">{{$noplanexpert}}</h4>
                                                    </div>

                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                         {{-- <canvas id="densityChart" width="600" height="400"></canvas> --}}

                                    </div>
                                </div>



  <div class="row">
                        <div class="col-xl-6">
                            <div class="card" >
                                <div class="card-body">
         <h4 class="card-title mb-4">Activity Progress</h4>

                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$total_plan_count}}</h5>
                                            <p class="text-muted text-truncate">Total</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$in_progress_and_completed_task}}</h5>
                                            <p class="text-muted text-truncate">On Progress/Completed</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$no_progress_task}}</h5>
                                            <p class="text-muted text-truncate">No Progress Activites</p>
                                        </div>
                                    </div>

                                    <canvas id="pie"   ></canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card"  >
                                <div class="card-body">

                                    <h4 class="card-title mb-4">Activites</h4>

                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$total_plan_count}}</h5>
                                            <p class="text-muted text-truncate">Total </p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$planed_count}}</h5>
                                            <p class="text-muted text-truncate">Planed Activity </p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$outof_plan_count}}</h5>
                                            <p class="text-muted text-truncate">Out Of Plan Activity</p>
                                        </div>
                                    </div>

                                    <canvas id="chart-area" ></canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>

     <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
 <?php $data =  $chart['chart_data']; ?>;
                                    <h4 class="card-title mb-4">Activity Progress</h4>

                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$total_plan_count}}</h5>
                                            <p class="text-muted text-truncate">Total</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$in_progress_and_completed_task}}</h5>
                                            <p class="text-muted text-truncate">On Progress/Completed</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mb-0">{{$no_progress_task}}</h5>
                                            <p class="text-muted text-truncate">No Progress Activites</p>
                                        </div>
                                    </div>

                               	<canvas class="charts" id="report"></canvas>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Recent Tasks</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Task Name</th>
                                                        <th scope="col">Expert Name</th>
                                                        <th scope="col">time</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $lastRecordDate as$key  => $single )


                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td>{{$single->task_name}}</td>
                                                        
                                                        <td>{{$single->user->name}}</td>
                                                        <td>{{$single->created_at}}
                         </td>

                                                    </tr>
                                                               @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- end col -->
                    </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
 @endsection


@section('script')

  {{--  <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>  --}}
                <!-- End Page-content -->
 <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
         <script src="{{ asset('assets/js/pages/chartjs.init.js')}}"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



 <script>
var cData = <?php echo $chart['chart_data']; ?>;
const labels = [265, 529, 820, 281, 526, 525, 240];
const data = {
  labels: cData.name,
  datasets: [{
    label: 'Number of Activity',
    data:cData.series,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
// Report Chart Config
let reportChart = document.getElementById("report");
const lineChart = new Chart(reportChart, {
	type: "bar",
	data: data,
	options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
});




     </script>
<script>
var plan = <?php echo $plan; ?>;
var ctx = document.getElementById("chart-area");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Planed Activity', 'Out of Plan Activity'],
    datasets: [{
      label: '# of Experts',
      data: plan,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: true,

  }
});
    </script>


<script>
var plan = <?php echo $activity; ?>;
var oilCanvas = document.getElementById("pie");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "No Progress Activity",
        "InProgress/Completed",


    ],
    datasets: [
        {
            data: plan,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});


</script>



@stop
