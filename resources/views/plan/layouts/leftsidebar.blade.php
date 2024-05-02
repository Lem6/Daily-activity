<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

       

                 
                

                


                


                  @role('superadministrator')
 <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-layouts">Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">


                                    <li>
{{--  {{route('daterange.expertview',$member->id)}}  --}}
                                        <a href="{{route('colors.color.index')}}" key="t-light-sidebar">Color Setting</a>
                                        <ul class="sub-menu" aria-expanded="true">

                                        </ul>
                                    </li>
         <li>
{{--  {{route('daterange.expertview',$member->id)}}  --}}
                                        <a href="{{route('calanders.calander.index')}}" key="t-light-sidebar">Calender Setting</a>
                                        <ul class="sub-menu" aria-expanded="true">

                                        </ul>
                                    </li>
                                     


                                </ul>
                            </li>
                             <li>
                <a href="{{route('calanders.calander.index')}}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Calanders</span>
                </a>
               </li>
               @endrole
                
@role('expert')

               <li>
                    <a href="{{ route('activities.perviousPlan') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
<li>
                <a href="/plan__tasks" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Plans</span>
                </a>
               </li>
                  {{-- <li>
                <a href="{{ route('activities.perviousPlan') }}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Pervious Plan</span>
                </a>
               </li> --}}
@endrole

@role('team_leader')

 <li>
                    <a href="{{ route('expert.Dashbored') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
<li>
                <a href="{{ route('plan__task.approve.index') }}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Approve Plan</span>
                </a>
               </li>
                <li>
                <a href="{{route('daterange.view_team')}}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Team Members</span>
                </a>
               </li>

                 <li>
                <a href="{{route('calanders.calander.index')}}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Calanders</span>
                </a>
               </li>
                 <li>
                <a href="{{route('additional__times.additional__time.index')}}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Permissions</span>
                </a>
               </li>
@endrole



@role('director_general')

 <li>
                    <a href="{{ route('daterange.view_director_g') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>
 <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-layouts">Centers</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">

                                 @foreach($centerside as$key  =>$row)
                                    <li>
{{--  {{route('daterange.expertview',$member->id)}}  --}}
                                        <a href="javascript: void(0);" class="has-arrow" key="t-vertical"> {{Str::limit($row->center_name, 20)}}</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                             @foreach ($directoratesside->where('center_id',$row->cid) as $key1=> $item)

                                            <li><a href="{{route ('daterange.view_expert',$item->directorate_id) }}" key="t-light-sidebar"> {{Str::limit($item->directorate_name, 20)}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                  @endforeach
                                </ul>
                            </li>
@endrole

@role('director')
 <li>
                    <a href="{{ route('daterange.view_director') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-chat">Dashboard</span>
                    </a>
                </li>

                     <li>
                     
                <a href="{{route ('daterange.expertlist') }}"key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">View Plan </span>
                </a>
               </li>
                <li>
                <a href="{{route('calanders.calander.index')}}" key="t-level-1-1">
                <i class="bx bx-briefcase-alt-2 "></i>
                <span key="t-chat">Calanders</span>
                </a>
               </li>
               @endrole 
              
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
