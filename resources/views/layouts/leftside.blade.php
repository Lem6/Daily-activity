<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title" key="t-menu">Menu</li> --}}
                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
                @can('user_list')
                <li>
                    <a  href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bx-user "></i>
                        <span key="t-chat">User Managment</span>
                    </a>
                </li>
                @endcan

			   @can('role-list')
                <li>
                    <a href="{{ route('roles.index') }}" class="waves-effect">
                        <i class="bx bxs-key "></i>
                        <span key="t-chat">Role</span>
                    </a>
                </li>
                @endcan
                @can('view_settings')
                     <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        @can('view_color_list')
                        <li>

                            <a href="{{route('colors.color.index')}}" key="t-light-sidebar">Color Setting</a>
                            <ul class="sub-menu" aria-expanded="true">

                            </ul>
                        </li>
                        @endcan
                        @can('calander_list')
                            <li>

                            <a href="{{route('calanders.calander.index')}}" key="t-light-sidebar">Calender Setting</a>
                            <ul class="sub-menu" aria-expanded="true">

                            </ul>
                        </li>
                        @endcan
                        @can('organizational_unit_list')

                        <li>

                            <a href="/organizations" key="t-light-sidebar">Organizational Units</a>
                            <ul class="sub-menu" aria-expanded="true">

                            </ul>
                        </li>
                       @endcan



                    </ul>
                </li>
                 @endcan

                 @can('change_logo')
                 <li>
                     <a href="{{ route('logo.index') }}" class="waves-effect">
                         <i class="bx bx-layout"></i>
                         <span key="t-chat">Change Logo</span>
                     </a>
                 </li>
                 @endcan
                 @can('motivation_list')
                 <li>
                     <a href="{{ route('motivations.motivation.index') }}" class="waves-effect">
                         <i class="bx bx-layout"></i>
                         <span key="t-chat">Motivations</span>
                     </a>
                 </li>
                 @endcan
{{-- all employee --}}
@can('view_employee_plan')
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bx-layout"></i>
        <span key="t-layouts">Organizational Units</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        @if($orgs->organazation->allChildren->count()>0)
     @foreach($orgs->organazation->allChildren as$key  =>$row)
        <li>
            <a href="{{ route('daterange.view_team',Crypt::encrypt($row->id)) }}"  key="t-vertical">  {{Str::limit($row->name, 20)}}</a>
            {{-- <ul class="sub-menu" aria-expanded="true">
                 @foreach ($directoratesside->where('center_id',$row->cid) as $key1=> $item)

                <li><a href="{{route ('daterange.view_expert',$item->directorate_id) }}" key="t-light-sidebar"> {{Str::limit($item->directorate_name, 20)}}</a></li>
                @endforeach
            </ul> --}}
        </li>

      @endforeach
      @else<li>
        <a href="{{ route('daterange.view_team',Crypt::encrypt($orgs->organazation->id)) }}"  key="t-vertical">   {{Str::limit($orgs->organazation->name, 20)}}</a>
      @endif
    </ul>
</li>
@endcan
             @can('view_plan_report')
                <li>
                    <a href="{{ route('daterange.view_director') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">Report</span>
                    </a>
                </li>
                @endcan
                @can('view_previous_plan')
                <li>
                    <a href="{{ route('activities.perviousPlan') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">Previous Plan</span>
                    </a>
                </li>
                @endcan
                @can('approve_plan')
                <li>
                    <a href="{{ route('plan__task.approve.index') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">Approve Plan</span>
                    </a>
                </li>
                @endcan
                @can('insert_plan')
                <li>
                    <a href="{{ route('plan__tasks.plan__task.index') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">Plan</span>
                    </a>
                </li>
                @endcan

                @can('update_planing_time')
                <li>
                    <a href="{{ route('additional__times.additional__time.index') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">Plan Permission </span>
                    </a>
                </li>
                @endcan
                @can('view_assigned_permission')
                <li>
                    <a href="{{ route('additional__times.additional__time.view') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2 "></i>
                        <span key="t-chat">View Assigned Permission </span>
                    </a>
                </li>
                @endcan


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
