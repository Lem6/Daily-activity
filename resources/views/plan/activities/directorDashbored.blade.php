@extends('plan.layouts.admin')
@section('title', 'daily plan')
@section('style')
    <!-- dragula css -->
    <link href="{{ asset('admin/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


@stop
@section('content')
    <style>
        .card-counter {
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover {
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary {
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger {
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success {
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info {
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i {
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers {
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name {
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
        }

        .counter {
            color: #eb3b5a;
            font-family: 'Muli', sans-serif;
            width: 200px;
            height: 200px;
            text-align: center;
            border-radius: 100%;
            padding: 77px 32px 40px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .counter:before,
        .counter:after {
            content: "";
            background: #fff;
            width: 80%;
            height: 80%;
            border-radius: 100%;
            box-shadow: -5px 5px 5px rgba(0, 0, 0, 0.3);
            transform: translateX(-50%)translateY(-50%);
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: -1;
        }

        .counter:after {
            background: linear-gradient(45deg, #B81242 49%, #D74A75 50%);
            width: 100%;
            height: 100%;
            box-shadow: none;
            transform: translate(0);
            top: 0;
            left: 0;
            z-index: -2;
            clip-path: polygon(50% 50%, 50% 0, 100% 0, 100% 100%, 0 100%, 0 50%);
        }

        .counter .counter-icon {
            color: #fff;
            background: linear-gradient(45deg, #B81242 49%, #D74A75 50%);
            font-size: 33px;
            line-height: 70px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            transition: all 0.3s;
        }

        .counter .counter-icon i.fa {
            transform: rotateX(0deg);
            transition: all 0.3s ease 0s;
        }

        .counter:hover .counter-icon i.fa {
            transform: rotateX(360deg);
        }

        .counter h3 {
            font-size: 17px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 3px;
        }

        .counter .counter-value {
            font-size: 30px;
            font-weight: 700;
        }

        .counter.orange {
            color: #F38631;
        }

        .counter.orange:after,
        .counter.orange .counter-icon {
            background: linear-gradient(45deg, #F38631 49%, #F8A059 50%);
        }

        .counter.green {
            color: #88BA1B;
        }

        .counter.green:after,
        .counter.green .counter-icon {
            background: linear-gradient(45deg, #88BA1B 49%, #ACD352 50%);
        }

        .counter.blue {
            color: #5DB3E4;
        }

        .counter.blue:after,
        .counter.blue .counter-icon {
            background: linear-gradient(45deg, #5DB3E4 49%, #7EBEE1 50%);
        }

        @media screen and (max-width:990px) {
            .counter {
                margin-bottom: 40px;
            }
        }


        .vertical {
            border-left: 6px solid black;
            height: 200px;
            position: absolute;
            left: 50%;
        }

    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">


                    </div>
                </div>
            </div>


            <!-- end page title -->




            <div class="row mb-4">
                <h4 class="card-title mb-4">Date Interval and Team </h4>
                {{-- <input type="hidden" id="custId" name="custId" value="{{$user->id}}"> --}}
                <div class="col-lg-8">
                    <div class="input-daterange input-group" id="project-date-inputgroup" data-provide="datepicker"
                        data-date-format="dd M, yyyy" data-date-container='#project-date-inputgroup'
                        data-date-autoclose="true">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Start Date" name="from_date"
                            id="from_date" />
                        <input type="text" class="form-control" autocomplete="off" placeholder="End Date" name="to_date" id="to_date" />
                    </div>
                </div>
                <div class="col-lg-2">
                    <form>

                                     {{-- @role('director') --}}
                        <select id="teamselect" class="form-control select2" placeholder="Select Team ">

                            {{-- <optgroup label="Select a Team "> --}}
                            <option value="">Select</option>
                                @foreach ($team as $single_team)


                                    <option  value="{{ $single_team->id }}">{{ $single_team->name }}
                                    </option>

                                @endforeach
                            {{-- </optgroup> --}}


                        </select>
                                {{-- @endrole --}}


                                   {{-- @role('director_general')
<select id="teamselect" class="form-control select2" placeholder="Select Team ">

                      
                            <option>Select a Directorate</option>
                                @foreach ($team as $single_team)


                                    <option  value="{{ $single_team->did}}">{{ $single_team->directorate_name  }}
                                    </option>

                                @endforeach
                          


                        </select>
                                     @endrole --}}






                    </form>
                </div>
                <div class="col-lg-2">
                    <button type="button" name="filter" id="filter" class="btn btn-outline-success waves-effect waves-light">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-outline-info waves-effect waves-light">Refresh</button>
                </div>


            </div>
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Timeline</h4>

            </div>
        </div>

            <div class="row" id="data">
                          
                   {{-- @role('director') --}}
                @include('plan.activities.dashboreddata')
                {{-- @endrole --}}
            </div>

   
  {{-- @role('director') --}}
    <script>
        var _token = $('input[name="_token"]').val();



        $('#filter').click(function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var team_id = $('#teamselect').val();

            if (from_date != '' && to_date != '' && team_id != '') {
                $.ajax({

                    url: "{{ route('daterange.dashbored_director') }}",
                    method: "GET",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        team_id: team_id,
                        _token: _token,
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log('hello again')
                        // var output = '';

                        $("#data").empty();
                        $('#data').html(data.html);

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    }
                })
            } else if (team_id != '') {

                $.ajax({

                    url: "{{ route('daterange.dashbored_director') }}",
                    method: "GET",
                    data: {
                        team_id: team_id,
                        _token: _token,
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log('hello again')
                        // var output = '';

                        $("#data").empty();
                        $('#data').html(data.html);
                        console.log(team_id)
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    }
                })


            } else {
                alert('Both Date and Team  are required');
            }
        });

        $('#refresh').click(function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#teamselect').val('');
            var expert_id = $('#custId').val();
            $.ajax({

                url: "{{ route('daterange.dashbored_director') }}",
                method: "GET",
                data: {
                    expert_id: expert_id,
                    _token: _token,
                },
                dataType: "json",
                success: function(data) {

                    // var output = '';

                    $("#data").empty();
                    $('#data').html(data.html);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }
            })
        });
    </script>
{{-- @endrole --}}
@endsection
