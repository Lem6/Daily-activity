@extends('plan.layouts.admin')
@role('superadministrator')
@section('title','Super Administrator Dashboard')
@endrole

@role('director_general')
@section('title','Director General Dashboard')
@endrole

@role('deputy_director_general')
@section('title','Deputy Director General Dashboard')
@endrole

@role('director')
@section('title','Director Dashboard')
@endrole

@role('center_coordinator')
@section('title','Center Cordinator Dashboard')
@endrole

@role('team_leader')
@section('title','Team Leader Dashboard')
@endrole

@role('pmo_director')
@section('title','Pmo Director Dashboard')
@endrole

@role('pmo_expert')
@section('title','Pmo Expert Dashboard')
@endrole

@role('kmo')
@section('title','kmo Director Dashboard')
@endrole

@if(Auth::check())
@if(Auth::user()->expert_projectmanager())
@section('title','Project Manager Dashboard')
@endif
@endif


@if(Auth::check())
@if(Auth::user()->expert())
@if ($director_members->manager !=0 )
@section('title','Project Manager')

@else
@section('title','Expert Dashboard')
@endif

@endif
@endif
@section('content')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>KPI Dashboard</p>
                                    </div>
                                </div>

                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('admin/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    @if(Auth::check())
                                    @if (Auth::user()->picture)
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{asset('storage/admins/'.Auth::user()->picture)}}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    @else
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ Auth::user()->getUrlfriendlyAvatar() }}" alt="" class="img-thumbnail rounded-circle">
                                    </div>
                                    @endif
                                    <h5 class="font-size-15 text-truncate">{{ Auth::user()->username }}</h5>

                                    @endif
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">


                                        <div class="mt-4">
                                            <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @role('superadministrator')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Activity</h4>
                            <ul class="verti-timeline list-unstyled">
                              @foreach ($activity as $item)
                              <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle font-size-18"></i>
                                </div>
                                <div class="media">
                                    <div class="me-3">
                                        <h5 class="font-size-14">{{ $item->created_at->toFormattedDateString()}} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                          {{$item->description}} <a href="{{ route('dashboard.show',$item->id)}}">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                              @endforeach


                            </ul>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                    </div>
                    @endrole

                    @role('director')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Chart</h4>

                            <div id="chart" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                    @endrole

                    @role('pmo_director')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Pmo Statistics</h4>

                            <div id="chartpd" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                    @endrole

                    @if(Auth::check())
                    @if(Auth::user()->expert_projectmanager())
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Team Members & Module</h4>

                            <div id="chartpm" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                    @endif
                    @endif

                    @role('expert')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Expert Statistics</h4>

                            <div id="chartex1" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                    @endrole

                </div>
                @role('superadministrator')
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Users</p>
                                            <h4 class="mb-0">{{ $t_admins }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Roles</p>
                                            <h4 class="mb-0">{{ $t_roles }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Permission</p>
                                            <h4 class="mb-0">{{ $t_permissions }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Stastics</h4>

                            </div>

                            <div id="donut_chart" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endrole

                @role('director_general')
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Projects</p>
                                            <h4 class="mb-0">{{ $t_admins }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Tasks</p>
                                            <h4 class="mb-0">{{ $t_roles }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Leaders</p>
                                            <h4 class="mb-0">{{ $t_permissions }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Stastics</h4>

                            </div>

                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endrole

                @role('pmo_director')
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">All Experts</p>
                                            <h4 class="mb-0">{{ $t_pmo_members }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Assigned Experts</p>
                                            <h4 class="mb-0">{{ $t_assigned_expert }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Proposed Projects</p>
                                            <h4 class="mb-0">{{ $t_business_case_pmod }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Approved Projects</p>
                                            <h4 class="mb-0">{{ $t_business_case_approved }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Rejected Projects</p>
                                            <h4 class="mb-0">{{ $t_business_case_rejected }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Pending Projects</p>
                                            <h4 class="mb-0">{{ $t_business_case_pending }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Proposed Projects in {{ $current_year }}</h4>

                            </div>
                            <div id="chartpmod" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endrole

                @role('pmo_expert')
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Project</p>
                                            <h4 class="mb-0">{{ $t_project_member_project }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Asked Questions</p>
                                            <h4 class="mb-0">{{ $t_business_case }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Stastics</h4>

                            </div>

                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endrole

                @role('director')
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Members</p>
                                            <h4 class="mb-0">{{ $t_director_members }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Proposed Projects</p>
                                            <h4 class="mb-0">{{ $t_business_case }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Project Managers</p>
                                            <h4 class="mb-0">{{ $t_manager }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Proposed Projects in {{ $current_year }}</h4>

                            </div>
                            <div id="chartq" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endrole

                @if(Auth::check())
                @if(Auth::user()->expert_projectmanager())
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Project</p>
                                            <h4 class="mb-0">{{ $t_approved_business_case }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Team Members</p>
                                            <h4 class="mb-0">{{$total_member }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Modules</p>
                                            <h4 class="mb-0">{{ $t_modules }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">{{ Auth::user()->name }} Projects</h4>

                            </div>
                            <div id="chartpm1" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endif
                @endif

                @if(Auth::check())
                @if(Auth::user()->expert())
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Project</p>
                                            <h4 class="mb-0">{{ $t_project_member_project }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Tasks</p>
                                            <h4 class="mb-0">{{ $t_tasks }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Modules</p>
                                            <h4 class="mb-0">{{ $t_modules_ex }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">{{ Auth::user()->name }} Tasks</h4>

                            </div>
                            <div id="chartex" class="apex-charts"  dir="ltr"></div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>




            </div>
            <!-- end row -->

            @role('director')
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Projects </h4>

                            <div class="page-title-right">

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    @if($case->count())
                    @foreach($case as$key  =>$row)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">


                                    <div class="media-body overflow-hidden">
                                        <h5 class="text-truncate font-size-15"><a href="{{ route('project_overview',$row->bid) }}" class="text-dark">{{ $row->project_name }}</a></h5>
                                        <p class="text-muted mb-4">{!! Str::limit($row->description, 100, ' ...') !!}</p>
                                        <div class="avatar-group">

                                            @foreach ($team_members1->where('project_id',$row->bid) as $team_member1)
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block">
                                                    <img src="{{asset('storage/admins/'.$team_member1->picture)}}" alt="" class="rounded-circle avatar-xs">
                                                </a>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <span class="badge bg-success">Completed</span>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <i class= "bx bx-person me-1">Project Manager :  {{ $row->name }}</i>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <i class= "bx bx-calendar me-1 text-primary"></i> {{ $row->start_date->toFormattedDateString() }}
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <i class= "bx bx-calendar-check me-1 text-primary"></i> {{ $row->end_date->toFormattedDateString() }}
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
                <!-- end row -->


                <!-- end row -->
            @endrole
<!-- KB dashboard start -->

                @role('worker')
                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole

                @role('superadministrator')

                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole

                @role('director_general')
                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole


                @role('director',)
                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole


                @role('kmo')
                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole

                @role('team_leader')
                <div class="row" style="margin-bottom: 10%;">
                    <!-- <h4>KB dashboard</h4> -->
                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Documents</p>
                                                <h4 class="mb-0">{{ $t_Documents }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted fw-medium">Templates</p>
                                                <h4 class="mb-0">{{$t_Template}}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div>
                @endrole
<!-- KB dashboard end -->


    <!-- End Page-content -->


@section('script')

<script>

    var options = {
        chart: { height: 320, type: "donut" },
        series: [{{ $t_admins }}, {{ $t_roles }}, {{ $t_permissions }}, {{ $t_centers }}, {{ $t_directorates }}],

        labels: ["Users", "Roles", "Permission", "Centers", "Directorates"],
        colors: ["#34c38f", "#556ee6", "#f46a6a", "#50a5f1", "#f1b44c"],
        dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
        },
    },

        legend: {
            show: !0,
            position: "bottom",
            horizontalAlign: "center",
            verticalAlign: "middle",
            floating: !1,
            fontSize: "14px",
            offsetX: 0
        },
        responsive: [
            {
                breakpoint: 600,
                options: { chart: { height: 240 }, legend: { show: !1 } }
            }
        ]
    };
    (chart = new ApexCharts(
        document.querySelector("#donut_chart"),
        options
    )).render();


</script>

 <script>


        var options = {
        chart: {
            width: 400,
            type: 'pie',
        },
        labels: ['Director Members','Project Managers'],
        series: [{{ $t_director_members }},{{ $t_manager }}],

        dataLabels: {
            formatter: function (val, opts) {
                return opts.w.config.series[opts.seriesIndex]
            },
        },
        }

        var chart = new ApexCharts(
        document.querySelector("#chart"),
        options);
        chart.render();
 </script>

<script>


    var options = {
    chart: {
        width: 400,
        type: 'pie',
    },
    labels: ['All Experts','Assigned Experts','Approved Projects','Rejected Projects','Pending Projects'],
    series: [{{ $t_pmo_members }},{{ $t_assigned_expert }},{{ $t_business_case_approved }},{{ $t_business_case_rejected }},{{ $t_business_case_pending }}],

    dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
        },
    },
    }

    var chart = new ApexCharts(
    document.querySelector("#chartpd"),
    options);
    chart.render();
</script>

<script>


    var options = {
    chart: {
        width: 400,
        type: 'pie',
    },
    labels: ['All Team Members','Modules'],
    series: [{{$total_member }},{{ $t_modules }}],

    dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
        },
    },
    }

    var chart = new ApexCharts(
    document.querySelector("#chartpm"),
    options);
    chart.render();
</script>

<script>


    var options = {
    chart: {
        width: 400,
        type: 'pie',
    },
    labels: ['Projects','Assigned Modules'],
    series: [{{$t_project_member_project }},{{ $t_modules_ex }}],

    dataLabels: {
        formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
        },
    },
    }

    var chart = new ApexCharts(
    document.querySelector("#chartex1"),
    options);
    chart.render();
</script>

<script>

    var options = {
        series: [{
        name: '{{ Auth::user()->name }} Projects',
        data: [{{ $proposed_project_manager[0] }}, {{ $proposed_project_manager[1] }}, {{ $proposed_project_manager[2] }}, {{ $proposed_project_manager[3] }}, {{ $proposed_project_manager[4] }}, {{ $proposed_project_manager[5] }}, {{ $proposed_project_manager[6] }}, {{ $proposed_project_manager[7] }}, {{ $proposed_project_manager[8] }}, {{ $proposed_project_manager[9] }}, {{ $proposed_project_manager[10] }}, {{ $proposed_project_manager[11] }}]
    }],
        annotations: {
        points: [{
        x: '{{ Auth::user()->name }} Projects',
        seriesIndex: 0,
        label: {
            borderColor: '#775DD0',
            offsetY: 0,
            style: {
            color: '#fff',
            background: '#775DD0',
            },
            text: '{{ Auth::user()->name }} Projects Of This Year',
        }
        }]
    },
    chart: {
        height: 350,
        type: 'bar',
    },
    plotOptions: {
        bar: {
        borderRadius: 10,
        columnWidth: '50%',
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 2
    },

    grid: {
        row: {
        colors: ['#fff', '#f2f2f2']
        }
    },
    xaxis: {
        labels: {
        rotate: -45
        },
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'July', 'Aug', 'Sep', 'Oct', 'Nov','dec',
        ],
        tickPlacement: 'on'
    },
    yaxis: {
        title: {
        text: '{{ Auth::user()->name }} Projects',
        },
    },
    fill: {
        type: 'gradient',
        gradient: {
        shade: 'light',
        type: "horizontal",
        shadeIntensity: 0.25,
        gradientToColors: undefined,
        inverseColors: true,
        opacityFrom: 0.85,
        opacityTo: 0.85,
        stops: [50, 0, 100]
        },
    }
    };

    var chart = new ApexCharts(document.querySelector("#chartpm1"), options);
    chart.render();
</script>

<script>

        var options = {
            series: [{
            name: '{{ Auth::user()->name }} Tasks',
            data: [{{ $t_tasks_chart[0] }}, {{ $t_tasks_chart[1] }}, {{ $t_tasks_chart[2] }}, {{ $t_tasks_chart[3] }}, {{ $t_tasks_chart[4] }}, {{ $t_tasks_chart[5] }}, {{ $t_tasks_chart[6] }}, {{ $t_tasks_chart[7] }}, {{ $t_tasks_chart[8] }}, {{ $t_tasks_chart[9] }}, {{ $t_tasks_chart[10] }}, {{ $t_tasks_chart[11] }}]
        }],
            annotations: {
            points: [{
            x: '{{ Auth::user()->name }} Tasks',
            seriesIndex: 0,
            label: {
                borderColor: '#775DD0',
                offsetY: 0,
                style: {
                color: '#fff',
                background: '#775DD0',
                },
                text: '{{ Auth::user()->name }} Tasks Of This Year',
            }
            }]
        },
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
            borderRadius: 10,
            columnWidth: '50%',
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 2
        },

        grid: {
            row: {
            colors: ['#fff', '#f2f2f2']
            }
        },
        xaxis: {
            labels: {
            rotate: -45
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'July', 'Aug', 'Sep', 'Oct', 'Nov','dec',
            ],
            tickPlacement: 'on'
        },
        yaxis: {
            title: {
            text: '{{ Auth::user()->name }} Tasks',
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
            },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartex"), options);
        chart.render();
</script>

<script>

    var options = {
         series: [{
         name: 'Proposed Projects',
         data: [{{ $proposed[0] }}, {{ $proposed[1] }}, {{ $proposed[2] }}, {{ $proposed[3] }}, {{ $proposed[4] }}, {{ $proposed[5] }}, {{ $proposed[6] }}, {{ $proposed[7] }}, {{ $proposed[8] }}, {{ $proposed[9] }}, {{ $proposed[10] }}, {{ $proposed[11] }}]
       }],
         annotations: {
         points: [{
           x: 'Proposed Projects',
           seriesIndex: 0,
           label: {
             borderColor: '#775DD0',
             offsetY: 0,
             style: {
               color: '#fff',
               background: '#775DD0',
             },
             text: 'Proposed Projects Of This Year',
           }
         }]
       },
       chart: {
         height: 350,
         type: 'bar',
       },
       plotOptions: {
         bar: {
           borderRadius: 10,
           columnWidth: '50%',
         }
       },
       dataLabels: {
         enabled: false
       },
       stroke: {
         width: 2
       },

       grid: {
         row: {
           colors: ['#fff', '#f2f2f2']
         }
       },
       xaxis: {
         labels: {
           rotate: -45
         },
         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
           'July', 'Aug', 'Sep', 'Oct', 'Nov','dec',
         ],
         tickPlacement: 'on'
       },
       yaxis: {
         title: {
           text: 'Proposed Projects',
         },
       },
       fill: {
         type: 'gradient',
         gradient: {
           shade: 'light',
           type: "horizontal",
           shadeIntensity: 0.25,
           gradientToColors: undefined,
           inverseColors: true,
           opacityFrom: 0.85,
           opacityTo: 0.85,
           stops: [50, 0, 100]
         },
       }
       };

       var chart = new ApexCharts(document.querySelector("#chartq"), options);
       chart.render();
</script>

<script>
        var options = {
            series: [{
            name: 'Proposed Projects',
            data: [{{ $proposed_pmo_director[0] }}, {{ $proposed_pmo_director[1] }}, {{ $proposed_pmo_director[2] }}, {{ $proposed_pmo_director[3] }}, {{ $proposed_pmo_director[4] }}, {{ $proposed_pmo_director[5] }}, {{ $proposed_pmo_director[6] }}, {{ $proposed_pmo_director[7] }}, {{ $proposed_pmo_director[8] }}, {{ $proposed_pmo_director[9] }}, {{ $proposed_pmo_director[10] }}, {{ $proposed_pmo_director[11] }}]
        }],
            annotations: {
            points: [{
            x: 'Proposed Projects',
            seriesIndex: 0,
            label: {
                borderColor: '#775DD0',
                offsetY: 0,
                style: {
                color: '#fff',
                background: '#775DD0',
                },
                text: 'Proposed Projects Of This Year',
            }
            }]
        },
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
            borderRadius: 10,
            columnWidth: '50%',
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 2
        },

        grid: {
            row: {
            colors: ['#fff', '#f2f2f2']
            }
        },
        xaxis: {
            labels: {
            rotate: -45
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'July', 'Aug', 'Sep', 'Oct', 'Nov','dec',
            ],
            tickPlacement: 'on'
        },
        yaxis: {
            title: {
            text: 'Proposed Projects',
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
            },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartpmod"), options);
        chart.render();
</script>



@stop
@endsection
