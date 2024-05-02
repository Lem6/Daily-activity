
                              <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Plan Time</h4>

                                        <div >
                                            <div id="donut-chart" class="apex-charts"></div>
                                        </div>

                                        <div class="text-center text-muted">
                                            <div class="row">
                                              @foreach ($colors as $color)
                                                <div class="col-4">
                                                    <div class="mt-4">
                                                        <p class="mb-2 text-truncate"><i style="color:{{$color->color}}" class="mdi mdi-circle  me-1"></i> {{$color->name}}</p>

                                                    </div>
                                                </div>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Plan Status</h4>

                                        <div >
                                            <div id="bar" class="apex-charts"></div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Plan Type</h4>

                                        <div >
                                            <div id="pie" class="apex-charts"></div>
                                        </div>


                                    </div>
                                </div>

 <!-- apexcharts -->
        <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>
                                 <script>

var cData = JSON.parse(`<?php echo $chart['chart_data']; ?>`);

options = { series: cData.series, chart: { type: "donut", height: 262 },
 labels: cData.name,
  colors: cData.color,
  legend: { show: !1 }, plotOptions: { pie: { donut: { size: "70%" } } } };
(chart = new ApexCharts(document.querySelector("#donut-chart"), options)).render();


var options = {
          series: [

             {
          name: 'Total Task',
          data: [{{ $total }}]
        },
          {
          name: 'Completed',
          data: [{{ $completed }}]
        }, {
          name: 'Not Reported ',
          data: [{{ $notreported }}]
        }, {
          name: 'Not Approved',
          data: [{{ $notapproved }}]
        },
        {
          name: 'Rejected',
          data: [{{ $rejected }}]
        },
        {
          name: 'By Permission',
          data: [{{ $perm }}]
        }
        ,
        {
          name: 'Common Work',
          data: [{{ $all }}]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Task Status'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#bar"), options);
        chart.render();

      var options = {
          series: [{{ $oplan }}, {{ $plan }}],
          chart: {
          width: 380,
          type: 'pie',
        },

        labels: ['Out of plan', 'Planned'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },

          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pie"), options);
        chart.render();


       </script>



