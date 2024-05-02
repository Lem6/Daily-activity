<div class="row">




    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">{{ $expert_count }}</span>
                            <span class="count-name">Total Expert</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-database"></i>
                            <span class="count-numbers">{{ $total_plan_count }}</span>
                            <span class="count-name">total Plan</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter primary ">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="count-numbers">{{ $todayexpert }}</span>
                            <span class="count-name">Planned Experts</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger ">
                            <i class="fas fa-user-slash"></i>
                            <span class="count-numbers">{{ $noplanexpert }}</span>
                            <span class="count-name">Expert with no Plan</span>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Activity Progress</h4>

                <div class="row text-center">
                    <div class="col-4">
                        <h5 class="mb-0">{{ $total_plan_count }}</h5>
                        <p class="text-muted text-truncate">Total</p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $in_progress_and_completed_task }}</h5>
                        <p class="text-muted text-truncate">On Progress/Completed</p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $no_progress_task }}</h5>
                        <p class="text-muted text-truncate">No Progress Activities</p>
                    </div>
                </div>

                <canvas id="pie"></canvas>

            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Activities</h4>

                <div class="row text-center">
                    <div class="col-4">
                        <h5 class="mb-0">{{ $total_plan_count }}</h5>
                        <p class="text-muted text-truncate">Total </p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $planed_count }}</h5>
                        <p class="text-muted text-truncate">Planned Activity </p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $outof_plan_count }}</h5>
                        <p class="text-muted text-truncate">Out Of Plan Activity</p>
                    </div>
                </div>

                <canvas id="chart-area"></canvas>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <?php $data = $chart['chart_data']; ?>;
                <h4 class="card-title mb-4">Activity Progress</h4>

                <div class="row text-center">
                    <div class="col-4">
                        <h5 class="mb-0">{{ $total_plan_count }}</h5>
                        <p class="text-muted text-truncate">Total</p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $in_progress_and_completed_task }}</h5>
                        <p class="text-muted text-truncate">On Progress/Completed</p>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-0">{{ $no_progress_task }}</h5>
                        <p class="text-muted text-truncate">No Progress Activities</p>
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
                                <th scope="col">Date</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lastRecordDate as $key => $single)


                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $single->task_name }}</td>
                                    <td>{{ $single->user->name }}</td>
                                    <td>{{ $single->created_at }}
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

    {{-- <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <h3>Web Designing</h3>
                        <span class="counter-value">1360</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="counter orange">
                        <div class="counter-icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                        <h3>Web Development</h3>
                        <span class="counter-value">1284</span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="counter blue">
                        <div class="counter-icon">
                            <i class="fa fa-plan"></i>
                        </div>
                        <h3>Web Development</h3>
                        <span class="counter-value">1284</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <canvas style="height:350px;" class="charts" id="myChart4"></canvas>

            </div>
        </div>
    </div>
</div>


<!-- end row -->









{{-- <script src="{{ asset('admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script> --}}
<!-- End Page-content -->
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script>
    var cData = <?php echo $chartbar['chart_data']; ?>;
    var ctx = document.getElementById('report').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cData.name,
            datasets: [{
                label: 'Number of Activity',
                data: cData.series,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    var cData = <?php echo $chart['chart_data']; ?>;

    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cData.label,
            datasets: getLineData(),

        },
        options: {
            tooltips: {
                displayColors: true,
                callbacks: {
                    mode: 'x',
                },
            },
            scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true,
                    },
                    type: 'linear',
                }]
            },
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom'
            },
        }
    });

    function getLineData() {
        var data = []
        for (i = 0; i < cData.name.length; i++) {
            //alert(cData.series[i]);
            var dataObject = {};
            dataObject['label'] = cData.name[i];

            dataObject['backgroundColor'] = cData.color[i];
            dataObject['data'] = cData.series[i];
            data.push(dataObject);
        }


        //console.log(data);


        return data
    }
</script>


<script>
    var plan = <?php echo $plan; ?>;
    var ctx = document.getElementById("chart-area");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Planned Activity', 'Out of Plan Activity'],
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
        datasets: [{
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

    $(document).ready(function() {
        $('.counter-value').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });


    $(document).ready(function() {
        $('.count-numbers').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
