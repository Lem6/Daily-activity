<?php

namespace App\Http\Controllers\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivitiesFormRequest;
use App\Models\Activity;
use App\Models\Color;
use App\Models\Plan_Task;
use App\DirectorMember;
use App\Directorate;
use App\Team;
use Auth;
use App\Logo;
use App\Role;
use App\Models\User;
use App\Models\Organization;
use Carbon\Carbon;
use App\DirectorUser;
use App\TeamUser;
use Exception;
use App\Traits\Get_All_Employee;
class ActivitiesController extends Controller
{
    use Get_All_Employee;

    //declar global varable
    protected  $all_experts ;
    protected  $all_org_unit;
// expert view
public function index()
{
    $activities = Activity::with('plantask','user','color')->paginate(15);

    return view('activities.index', compact('activities'));
}


// director view members
 public function viewDirector(){

    if(Auth::user()->hasRole('director')){

        $req_id=Auth::user()->id;
        $users = DirectorUser::where('user_id',$req_id)->first();
        $colors = Color::orderBy('plan_start_time', 'asc')->get();
        $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
        ->where('director_members.directorate_id','=', $users->directorate_id)
        ->where('users.type','6')
        ->select('director_members.*','users.*')->orderBy('users.name','asc')->get();
        $did =$users->directorate_id;
         }

        return view('plan.activities.viewdirMember', compact('director_members', 'users','did', 'colors'));
}

public function ExpertDetail($id, $did){
    $colors = Color::orderBy('plan_start_time', 'asc')->get();
      if(Auth::user()->hasRole('director')){

    $req_id=Auth::user()->id;
    $users = DirectorUser::where('user_id',$req_id)->first();

    $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
    ->where('director_members.directorate_id','=', $users->directorate_id)
    ->where('users.type','6')
    ->select('director_members.*','users.*')->orderBy('users.name','asc')->get();


    $data =  Plan_Task::with('color')->where('user_id', $id)->whereDate('created_at', Carbon::today())->get();
    $user = User::find($id);


      }
      else {
        $users = DirectorUser::where('user_id', $id)->first();
        $data =  Plan_Task::with('color')->where('user_id', $id)->whereDate('created_at', Carbon::today())->get();
        $user = User::find($id);
        // $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
        //     ->where('director_members.directorate_id', '=', $users->directorate_id)
        //     ->select('director_members.*', 'users.*')->get();
        $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
        ->where('director_members.directorate_id', '=', $did)
        ->where('users.type','6')
        ->select('director_members.*', 'users.*')->orderBy('users.name','asc')->get();
      }

     return view('plan.activities.director',compact('director_members','data','user','id','did', 'colors'));
}




// expert can view his own plan
     public function index2()
{
     $colors=Color::orderBy('plan_start_time','asc')->get();
    $data =  Plan_Task::with('color')->where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
    $user = User::find(Auth::user()->id);

    $chart = [];

    foreach($colors as $color) {
       $chart['series'][] = (int) $data->where('color_id',$color->id)->count();
       $chart['name'][] =  $color->name;
       $chart['color'][] =  $color->color;
     }
     $chart['chart_data'] = json_encode($chart);

$completed=$data->where('progress',2)->where('approved_status',2)->count();
$notreported=$data->where('progress',0)->count();
$notapproved=$data->where('approved_status',0)->count();
$rejected=$data->where('approved_status',1)->count();
$perm=$data->where('task_type',3)->count();
$plan=$data->where('task_type',0)->count();
$oplan=$data->where('task_type',1)->count();
$all=$data->where('task_type',2)->count();
$total=$data->count();

if($data->count()>0){
    $pdays=1;
    $unpday=0;
}else{
    $pdays=0;
    $unpday=0;
}
$chart_data = [

    'completed' => $completed,
    'notreported' => $notreported,
    'notapproved' => $notapproved,
    'rejected' => $rejected,
    'perm' => $perm,
    'plan' => $plan,
    'oplan' => $oplan,
    'all' => $all,
    'total' => $total,
    'pdays'=>$pdays,
    'unpday'=>$unpday,

];




    return view('plan.activities.index',$chart_data, compact('data','colors', 'user','chart'));
}
// expert profile
public function expert_profile($id)
{
     $colors=Color::orderBy('plan_start_time','asc')->get();
    $data =  Plan_Task::with('color')->where('user_id', $id)->whereDate('created_at', Carbon::today())->get();
    $user = User::find($id);

    $chart = [];

    foreach($colors as $color) {
       $chart['series'][] = (int) $data->where('color_id',$color->id)->count();
       $chart['name'][] =  $color->name;
       $chart['color'][] =  $color->color;
     }
     $chart['chart_data'] = json_encode($chart);

$completed=$data->where('progress',2)->where('approved_status',2)->count();
$notreported=$data->where('progress',0)->count();
$notapproved=$data->where('approved_status',0)->count();
$rejected=$data->where('approved_status',1)->count();
$perm=$data->where('task_type',3)->count();
$plan=$data->where('task_type',0)->count();
$oplan=$data->where('task_type',1)->count();
$all=$data->where('task_type',2)->count();
$total=$data->count();

if($data->count()>0){
    $pdays=1;
    $unpday=0;
}else{
    $pdays=0;
    $unpday=0;
}
$chart_data = [

    'completed' => $completed,
    'notreported' => $notreported,
    'notapproved' => $notapproved,
    'rejected' => $rejected,
    'perm' => $perm,
    'plan' => $plan,
    'oplan' => $oplan,
    'all' => $all,
    'total' => $total,
    'pdays'=>$pdays,
    'unpday'=>$unpday,

];




    return view('plan.activities.index',$chart_data, compact('data','colors', 'user','chart'));
}

// expert can view his own plan  featchs data with ajax
function fetch_data(Request $request)    {

 if($request->ajax()){
    if($request->from_date != '' && $request->to_date != '')  {
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')));
        $data =  Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereBetween('created_at',[$start,$end])->get();
        }
    else {

            $data =  Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
                }
    $output="";
    $count = 0;
    foreach($data as $datas)
                    {
        $count +=1;
        $ptime=strtotime($datas->planing_time.' + '.$datas->color->edit_time.' minute');
        $date = Carbon::now()->format('j-f-Y');

        $output.='<tr>'.
        '<td>'.  $count.'</td>'.
        '<td> <h5 class="text-truncate font-size-14"> '.$datas->task_name.' </h5>
         <p class="text-muted mb-0">'.$datas->description .'</P>
         </td>'.
        '<td>'.$datas->updated_at .'</td>'.

         '<td><span class="badge bg-success">Completed</span></td>'.
        '<td> <div class="mini-stat-icon avatar-sm rounded-circle bg-danger">
        <span class="avatar-title" style="background-color:'.$datas->color->color. '">
        <i class="bx bx-time font-size-24"></i>    </span>  </div> </td>'
                       . '</tr>';




    }

echo json_encode(array($output));

 }
}






#director and team leader daily activity ajax file

function fetch_date(Request $request)    {

 if($request->ajax()){


    $expert_id = $request->expert_id;
     $id = $expert_id;


    $user = User::find($id);
    $colors=Color::orderBy('plan_start_time','asc')->get();
    if($request->from_date != '' && $request->to_date != '' && $request->expert_id != '')  {
        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end = date("Y-m-d",strtotime($request->input('to_date')));
        $expert_id = $request->expert_id;
        $data =  Plan_Task::with('color')->where('user_id',$expert_id)->whereBetween('created_at',[$start,$end])->orderBy('created_at', 'ASC')->get();
       }
    else {
        $expert_id = $request->expert_id;
        $data =  Plan_Task::with('color')->where('user_id',$expert_id)->whereDate('created_at', Carbon::today())->get();

              $start = Carbon::today();
            $end = Carbon::today();

        }

$startDate = new \DateTime($start);
$endDate = new \DateTime($end);
$ends = $endDate->modify('+1 day');

$interval = \DateInterval::createFromDateString('1 day');
$period = new \DatePeriod($startDate, $interval, $ends);


$returnHTML  = view("plan.activities.tabel",compact('data','user','id','period','colors'))->render();

    $chart = [];

    foreach($colors as $color) {
       $chart['series'][] = (int) $data->where('color_id',$color->id)->count();
       $chart['name'][] =  $color->name;
       $chart['color'][] =  $color->color;
     }
     $chart['chart_data'] = json_encode($chart);

$completed=$data->where('progress',2)->where('approved_status',2)->count();
$notreported=$data->where('progress',0)->count();
$notapproved=$data->where('approved_status',0)->count();
$rejected=$data->where('approved_status',1)->count();
$perm=$data->where('task_type',3)->count();
$plan=$data->where('task_type',0)->count();
$oplan=$data->where('task_type',1)->count();
$all=$data->where('task_type',2)->count();
$total=$data->count();

$totaldays="0";
foreach ($period as $date)
{
    $ldate = date('Y-m-d');
    $fdate =  $date->format('Y-m-d');
    if (!in_array($date->format('N'), [6,7])  || $fdate >  $ldate ){
        $totaldays+=1;
    }

}
$pdays=$data->unique('created_at')->count();
$unpday=$totaldays-$pdays;

$chart_data = [

    'completed' => $completed,
    'notreported' => $notreported,
    'notapproved' => $notapproved,
    'rejected' => $rejected,
    'perm' => $perm,
    'plan' => $plan,
    'oplan' => $oplan,
    'all' => $all,
    'total' => $total,

];


$plandays  = view("plan.activities.plan_day",$chart_data,compact('total','pdays','unpday'))->render();

$returncolor  = view("plan.activities.color_count",$chart_data,compact('data','user','id','period','colors','chart'))->render();

// if(!Auth::user()->hasRole('expert'))
// {
$count_color  = view("plan.activities.color_count_team",compact('data','user','id','period','colors'))->render();

// }
// else{
//     $count_color="";
// }


return response()->json( array('success' => true, 'html'=>$returnHTML,'totalcolor'=>$returncolor,'plandays'=>$plandays,'count_color'=>$count_color) );

 }
}


// expert list for  general director
function viewExperts($id)
{
    $colors = Color::orderBy('plan_start_time', 'asc')->get();
    // $members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
    // ->select('director_members.*', 'users.*')->get();
    // $members_list = $members->where('directorate_id', $id);
    $did = $id;

    $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
    ->where('director_members.directorate_id', '=', $id)
    ->where('users.type','6')
    ->select('director_members.*', 'users.*')->orderBy('users.name')->get();

    return view('plan.activities.viewdirMember', compact('director_members', 'did', 'colors'));

}


//view expert list for team leader
function viewTeam($id)
{
    $id=\Crypt::decrypt($id);

    //$departments = Organization::with('experts.PlanTask')->find(1);
      $departments=Organization::findorfail($id);
      $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
      $this->getemployee($departments);

$director_members  = $this->all_experts;

    $colors = Color::orderBy('plan_start_time', 'asc')->get();

    return view('plan.activities.viewTeamMember', compact('director_members', 'departments','colors'));


}
//specfic expert for team leader
public function viewteamleader($id)
{
    $id=\Crypt::decrypt($id);

    $colors = Color::orderBy('plan_start_time', 'asc')->get();
    $data =  Plan_Task::with('color')->where('user_id', $id)->whereDate('created_at', Carbon::today())->get();
    $user = User::find($id);
    $logedUser = User::find(Auth::user()->id);
    $departments=Organization::findorfail($logedUser->organazation->id);

      $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
      $this->getemployee($departments);

      $director_members  = $this->all_experts->where('id','!=',$id);

    return view('plan.activities.teamleader', compact('director_members','data','user', 'colors'));
}

//teamleader dashbored
public function teamDashbored()
{

    if (!Auth::user()->teams) {

        return back()->withInput()->with('toast_error', 'Team Leader Not assigned to specfic Directorate .');
    }



    $did = Auth::user()->teams->team_id;
    $today =  Plan_Task::where('team_id', '=', $did)->whereDate('created_at', Carbon::today())->count();
    $expert_count = TeamUser::where('team_id', '=', $did)->count();
    $todayexpert =  Plan_Task::where('team_id', '=', $did)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
    $noplanexpert =  $expert_count -  $todayexpert;


    $total_plan_count = Plan_Task::where('team_id', '=', $did)->count();
    $planed_count = Plan_Task::where([['team_id', '=', $did], ['task_type', '=', '0']])->count();
    $outof_plan_count = Plan_Task::where([['team_id', '=', $did], ['task_type', '=', '1']])->count();
    // dd($outof_plan_count);
    $no_progress_task = Plan_Task::where([['team_id', '=', $did], ['progress', '=', '0']])->count();

    $in_progress_and_completed_task = Plan_Task::whereIn('progress', array(1, 2))->where('team_id', '=', $did)->count();

    $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

    $planed = [$planed_count, $outof_plan_count];

    $plan = json_encode($planed, JSON_NUMERIC_CHECK);
    $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

    $data = Plan_Task::where('team_id', '=', $did)->get();
    $lastRecordDate = Plan_Task::where('team_id', '=', $did)->orderBy('created_at', 'DESC')->take(10)->get();
    $chart = [];
    $colors = Color::orderBy('plan_start_time', 'asc')->get();
    foreach ($colors as $color) {
        $chart['series'][] = (int) $data->where('color_id', $color->id)->count();
        $chart['name'][] =  $color->name;
        $chart['color'][] =  $color->color;
    }

    $chart['chart_data']   = json_encode($chart);


    return view('plan.activities.teamLeaderdashbored', compact('plan', 'planed_count', 'outof_plan_count', 'total_plan_count', 'no_progress_task', 'in_progress_and_completed_task', 'activity', 'today', 'todayexpert', 'noplanexpert', 'chart', 'lastRecordDate'),);
}
//dashbored for director
public function directorDashbored()
{
    $employee=Auth::user();
    //$departments = Organization::with('experts.PlanTask')->find(1);
      $departments=$employee->organazation;
      $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;


      $this->getemployee($departments);


$orgexperts  = $this->all_experts;

//get all employee id
$array_experts= $this->all_experts->pluck('id')->toarray();



    // if (!Auth::user()->directorate) {

    //     return back()->withInput()->with('toast_error', 'Team Leader Not assagined to specfic Team .');
    // }

    // $did = Auth::user()->directorate->directorate_id;
    $today =  Plan_Task::whereIn('user_id', $array_experts)->whereDate('created_at', Carbon::today())->count();

    $req_id = Auth::user()->id;
    //$users = DirectorUser::where('user_id', $req_id)->first();

    $colors = Color::orderBy('plan_start_time', 'asc')->get();
    $expert_count = count($orgexperts);

    $todayexpert =  Plan_Task::whereIn('user_id', $array_experts)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
    $noplanexpert =  $expert_count -  $todayexpert;


    $total_plan_count = Plan_Task::whereIn('user_id', $array_experts)->count();
    $planed_count = Plan_Task::whereIn('user_id', $array_experts)->whereIn('task_type',['0', '2'])->count();
    $outof_plan_count = Plan_Task::whereIn('user_id', $array_experts)->where('task_type', '=', '1')->count();
    // dd($outof_plan_count);
    $no_progress_task = Plan_Task::whereIn('user_id', $array_experts)->where('progress', '=', '0')->count();
    $in_progress_and_completed_task = Plan_Task::whereIn('user_id', $array_experts)->whereIn('progress', ['1', '2'])->count();

    $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

    $planed = [$planed_count, $outof_plan_count];

    $plan = json_encode($planed, JSON_NUMERIC_CHECK);
    $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

    $data = Plan_Task::whereIn('user_id', $array_experts)->get();
    $lastRecordDate = Plan_Task::whereIn('user_id', $array_experts)->orderBy('created_at', 'DESC')->distinct()->take(7)->get();
    $chart = [];
    $chartbar = [];
    $colors = Color::orderBy('plan_start_time', 'asc')->get();

    $team = $departments->children;

    //score card base on expert chart
    foreach ($colors as $color) {
        $chartbar['series'][] = (int) $data->where('color_id', $color->id)->count();
        $chartbar['name'][] =  $color->name;
        $chartbar['color'][] =  $color->color;
    }

    $chartbar['chart_data']   = json_encode($chartbar);


    //score card base on team chart
    foreach ($colors as $num => $color) {
        $chart['name'][] =  $color->name;
        $chart['color'][] =  $color->color;

        foreach ($team as $key =>$singleteam) {
            $this->all_org_unit  = new \Illuminate\Database\Eloquent\Collection;
            $org=Organization::where('id',$singleteam->id)->get();
            $this->getOrgUnit($singleteam);
            $this->all_org_unit = $this->all_org_unit->merge($org);
            //get all org unit id
            $array_org_units= $this->all_org_unit->pluck('id')->toarray();
            // if($key==2){
            // dd($array_org_units);
            // }

            if ($num == '0') {
                $chart['label'][] =  $singleteam->name;
            }
//dd(Plan_Task::where('color_id', '=', $color->id)->whereIn('parent_id', $array_org_units)->count());
            $chart['series'][$num][] = (int) Plan_Task::where('color_id', '=', $color->id)->whereIn('parent_id', $array_org_units)->count();
        }

    }

    $chart['chart_data']   = json_encode($chart);
  // dd($chart['chart_data']);
    return view('plan.activities.directorDashbored', compact('plan', 'planed_count', 'outof_plan_count', 'total_plan_count', 'no_progress_task', 'in_progress_and_completed_task', 'activity', 'today', 'todayexpert', 'noplanexpert', 'chart', 'chartbar', 'lastRecordDate', 'team', 'expert_count'),);
}

//dashbored for the director  update with data range
public function directorDashboredupdate(Request $request)
{
    $chart = [];
    $chartbar = [];

    if ($request->ajax()) {
        if (!Auth::user()->directorate) {

            return back()->withInput()->with('toast_error', 'Director is Not assagined to specfic Directorate .');
        }
        if ($request->from_date != '' && $request->to_date != '' && $request->team_id != '') {
            $team_id = $request->team_id;

            //format the date
            $start = date("Y-m-d", strtotime($request->input('from_date')));
            $end = date("Y-m-d", strtotime($request->input('to_date')));
            // $expert_id = $request->expert_id;
            // $data =  Plan_Task::with('color')->where('user_id', $expert_id)->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->get();

            $did = Auth::user()->directorate->directorate_id;
            $today =  Plan_Task::where('team_id', '=', $team_id)->whereDate('created_at', Carbon::today())->count();
            //director id
            $req_id = Auth::user()->id;
            //featch directorate id
            $users = DirectorUser::where('user_id', $req_id)->first();
            $colors = Color::orderBy('plan_start_time', 'asc')->get();

            //expert count within team

            $expert_count = TeamUser::where('team_id', '=', $team_id)->count();

            // expert that have planed
            $todayexpert =  Plan_Task::where('team_id', '=', $team_id)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
            //expert havent planed today
            $noplanexpert =  $expert_count -  $todayexpert;


            $total_plan_count = Plan_Task::where('team_id', '=', $team_id)->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->count();

            $planed_count = Plan_Task::where([['team_id', '=', $team_id], ['task_type', '=', '0']])->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->count();
            $outof_plan_count = Plan_Task::where([['team_id', '=', $team_id], ['task_type', '=', '1']])->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->count();
            // dd($outof_plan_count);
            $no_progress_task = Plan_Task::where([['team_id', '=', $team_id], ['progress', '=', '0']])->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->count();
            $in_progress_and_completed_task = Plan_Task::whereBetween('created_at', [$start, $end])->whereIn('progress', array(1, 2))->where('team_id', '=', $team_id)->count();

            $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

            $planed = [$planed_count, $outof_plan_count];

            $plan = json_encode($planed, JSON_NUMERIC_CHECK);
            $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

            $data = Plan_Task::where('team_id', '=', $team_id)->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->get();
            $lastRecordDate = Plan_Task::where('team_id', '=', $team_id)->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'DESC')->take(7)->get();




        }


       elseif ( $request->team_id != '') {
            $team_id = $request->team_id;

            // $expert_id = $request->expert_id;
            // $data =  Plan_Task::with('color')->where('user_id', $expert_id)->whereBetween('created_at', [$start, $end])->orderBy('created_at', 'ASC')->get();

            $did = Auth::user()->directorate->directorate_id;
            $today =  Plan_Task::where('team_id', '=', $team_id)->whereDate('created_at', Carbon::today())->count();

            $req_id = Auth::user()->id;
            $users = DirectorUser::where('user_id', $req_id)->first();
            $colors = Color::orderBy('plan_start_time', 'asc')->get();
            $expert_count = TeamUser::where('team_id', '=', $team_id)->count();

            $todayexpert =  Plan_Task::where('team_id', '=', $team_id)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
            $noplanexpert =  $expert_count -  $todayexpert;


            $total_plan_count = Plan_Task::where('team_id', '=', $team_id)->count();
            $planed_count = Plan_Task::where([['team_id', '=', $team_id], ['task_type', '=', '0']])->count();
            $outof_plan_count = Plan_Task::where([['team_id', '=', $team_id], ['task_type', '=', '1']])->count();
            // dd($outof_plan_count);
            $no_progress_task = Plan_Task::where([['team_id', '=', $team_id], ['progress', '=', '0']])->count();
            $in_progress_and_completed_task = Plan_Task::where([['team_id', '=', $team_id], ['progress', '=', '1']])->orWhere([['team_id', '=', $team_id], ['progress', '=', '2']])->count();

            $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

            $planed = [$planed_count, $outof_plan_count];

            $plan = json_encode($planed, JSON_NUMERIC_CHECK);
            $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

            $data = Plan_Task::where('team_id', '=', $team_id)->get();
            $lastRecordDate = Plan_Task::where('team_id', '=', $team_id)->orderBy('created_at', 'DESC')->take(7)->get();
        }


        else {
            $expert_id = $request->expert_id;
            $data =  Plan_Task::with('color')->where('user_id', $expert_id)->whereDate('created_at', Carbon::today())->get();




        $did = Auth::user()->directorate->directorate_id;
        $today =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->count();

        $req_id = Auth::user()->id;
        $users = DirectorUser::where('user_id', $req_id)->first();
        $colors = Color::orderBy('plan_start_time', 'asc')->get();
        $expert_count = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
            ->where('director_members.directorate_id', '=', $users->directorate_id)
            ->select('director_members.*', 'users.*')->count();

        $todayexpert =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
        $noplanexpert =  $expert_count -  $todayexpert;


        $total_plan_count = Plan_Task::where('directorate_id', '=', $did)->count();
        $planed_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '0']])->count();
        $outof_plan_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '1']])->count();
        // dd($outof_plan_count);
        $no_progress_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '0']])->count();
        $in_progress_and_completed_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '1']])->orWhere([['directorate_id', '=', $did], ['progress', '=', '2']])->count();

        $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

        $planed = [$planed_count, $outof_plan_count];

        $plan = json_encode($planed, JSON_NUMERIC_CHECK);
        $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

        $data = Plan_Task::where('directorate_id', '=', $did)->get();
        $lastRecordDate = Plan_Task::where('directorate_id', '=', $did)->orderBy('created_at', 'DESC')->take(7)->get();


        $team = Team::where('directorate_id', '=', $did)->get();
        }
        //score card base on expert chart
        foreach ($colors as $color) {
            $chartbar['series'][] = (int) $data->where('color_id', $color->id)->count();
            $chartbar['name'][] =  $color->name;
            $chartbar['color'][] =  $color->color;
        }
        $colors = Color::orderBy('plan_start_time', 'asc')->get();
        $team = Team::where('directorate_id', '=', $did)->get();
        $chartbar['chart_data']   = json_encode($chartbar);
        $datad = Plan_Task::where('directorate_id', '=', $did)->get();
        //score card base on team chart
        foreach ($colors as $num => $color) {
            $chart['name'][] =  $color->name;
            $chart['color'][] =  $color->color;

            foreach ($team as $singleteam) {
                if ($num == '0') {
                    $chart['label'][] =  $singleteam->team_name;
                }

                $chart['series'][$num][] = (int) $datad->where('color_id', '=', $color->id)->where('team_id', '=', $singleteam->tid)->count();
            }
        }
        $chart['chart_data']   = json_encode($chart);

        $returnHTML  = view("plan.activities.dashboreddata", compact('plan', 'planed_count', 'outof_plan_count', 'total_plan_count', 'no_progress_task', 'in_progress_and_completed_task', 'activity', 'today', 'todayexpert', 'noplanexpert', 'chart', 'chartbar', 'lastRecordDate', 'expert_count'))->render();




        return response()->json(array('success' => true, 'html' => $returnHTML));

    }
}

 //dashbored for director general
 public function generalDirectorDashbored()
 {
     if (!Auth::user()->hasRole('director_general')) {

         return back()->withInput()->with('toast_error', 'Director General is Not assagined to specfic Organization .');
     }

     // $did = Auth::user()->directorate->directorate_id;
     $today =  Plan_Task::whereDate('created_at', Carbon::today())->count();

     // $req_id = Auth::user()->id;
     // $users = DirectorUser::where('user_id', $req_id)->first();
     $colors = Color::orderBy('plan_start_time', 'asc')->get();
     $expert_count = DirectorMember::all()->count();



     $todayexpert =  Plan_Task::whereDate('created_at', Carbon::today())->distinct()->count('user_id');
     $noplanexpert =  $expert_count -  $todayexpert;


     $total_plan_count = Plan_Task::all()->count();
     $planed_count = Plan_Task::where('task_type', '=', '0')->count();
     $outof_plan_count = Plan_Task::where('task_type', '=', '1')->count();
     // dd($outof_plan_count);
     $no_progress_task = Plan_Task::where('progress', '=', '0')->count();
     $in_progress_and_completed_task = Plan_Task::where('progress', '=', '1')->orWhere('progress', '=', '2')->count();

     $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

     $planed = [$planed_count, $outof_plan_count];

     $plan = json_encode($planed, JSON_NUMERIC_CHECK);
     $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

     $data = Plan_Task::all();
     $lastRecordDate = Plan_Task::orderBy('created_at', 'DESC')->take(7)->get();
     $chart = [];
     $chartbar = [];
     $colors = Color::orderBy('plan_start_time', 'asc')->get();
     $team = Directorate::all();

     //score card base on expert chart
     foreach ($colors as $color) {
         $chartbar['series'][] = (int) $data->where('color_id', $color->id)->count();
         $chartbar['name'][] =  $color->name;
         $chartbar['color'][] =  $color->color;
     }

     $chartbar['chart_data']   = json_encode($chartbar);


     //score card base on team chart
     foreach ($colors as $num => $color) {
         $chart['name'][] =  $color->name;
         $chart['color'][] =  $color->color;

         foreach ($team as $singleteam) {
             if ($num == '0') {
                 $chart['label'][] =  $singleteam->team_name;
             }

             $chart['series'][$num][] = (int) $data->where('color_id', '=', $color->id)->where('team_id', '=', $singleteam->tid)->count();
         }
     }
     $chart['chart_data']   = json_encode($chart);


     return view('plan.activities.directorDashbored', compact('plan', 'planed_count', 'outof_plan_count', 'total_plan_count', 'no_progress_task', 'in_progress_and_completed_task', 'activity', 'today', 'todayexpert', 'noplanexpert',  'chartbar', 'lastRecordDate', 'team', 'expert_count'),);
 }

   //dashbored for the director general  update with data range
   public function generalDirectorDashboredupdate(Request $request)
   {
       $chart = [];
       $chartbar = [];

       if ($request->ajax()) {
           if (!Auth::user()->hasRole('director_general')) {

               return back()->withInput()->with('toast_error', 'Director General is not assigned to specfic Organization .');
           }
           if ($request->from_date != '' && $request->to_date != '' && $request->team_id != '') {
               $did = $request->team_id;



               $today =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->count();

               // $req_id = Auth::user()->id;
               // $users = DirectorUser::where('user_id', $req_id)->first();
               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $expert_count = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
               ->where('director_members.directorate_id', '=', $did)
               ->select('director_members.*', 'users.*')->count();

               $todayexpert =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
               $noplanexpert =  $expert_count -  $todayexpert;


               $total_plan_count = Plan_Task::where('directorate_id', '=', $did)->count();
               $planed_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '0']])->count();
               $outof_plan_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '1']])->count();
               // dd($outof_plan_count);
               $no_progress_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '0']])->count();
               $in_progress_and_completed_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '1']])->orWhere([['directorate_id', '=', $did], ['progress', '=', '2']])->count();

               $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

               $planed = [$planed_count, $outof_plan_count];

               $plan = json_encode($planed, JSON_NUMERIC_CHECK);
               $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

               $data = Plan_Task::where('directorate_id', '=', $did)->get();
               $lastRecordDate = Plan_Task::where('directorate_id', '=', $did)->orderBy('created_at', 'DESC')->take(7)->get();
               $chart = [];
               $chartbar = [];
               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $team = Team::where('directorate_id', '=', $did)->get();

               //score card base on expert chart

           } elseif ($request->team_id != '') {
               $did = $request->team_id;
               $today =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->count();


               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $expert_count = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
               ->where('director_members.directorate_id', '=',$did)
               ->select('director_members.*', 'users.*')->count();

               $todayexpert =  Plan_Task::where('directorate_id', '=', $did)->whereDate('created_at', Carbon::today())->distinct()->count('user_id');
               $noplanexpert =  $expert_count -  $todayexpert;


               $total_plan_count = Plan_Task::where('directorate_id', '=', $did)->count();
               $planed_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '0']])->count();
               $outof_plan_count = Plan_Task::where([['directorate_id', '=', $did], ['task_type', '=', '1']])->count();
               // dd($outof_plan_count);
               $no_progress_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '0']])->count();
               $in_progress_and_completed_task = Plan_Task::where([['directorate_id', '=', $did], ['progress', '=', '1']])->orWhere([['directorate_id', '=', $did], ['progress', '=', '2']])->count();

               $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

               $planed = [$planed_count, $outof_plan_count];

               $plan = json_encode($planed, JSON_NUMERIC_CHECK);
               $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

               $data = Plan_Task::where('directorate_id', '=', $did)->get();
               $lastRecordDate = Plan_Task::where('directorate_id', '=', $did)->orderBy('created_at', 'DESC')->take(7)->get();
               $chart = [];
               $chartbar = [];
               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $team = Team::where('directorate_id', '=', $did)->get();


           } else {
               $today =  Plan_Task::whereDate('created_at', Carbon::today())->count();

               // $req_id = Auth::user()->id;
               // $users = DirectorUser::where('user_id', $req_id)->first();
               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $expert_count = DirectorMember::all()->count();



               $todayexpert =  Plan_Task::whereDate('created_at', Carbon::today())->distinct()->count('user_id');
               $noplanexpert =  $expert_count -  $todayexpert;


               $total_plan_count = Plan_Task::all()->count();
               $planed_count = Plan_Task::where('task_type', '=', '0')->count();
               $outof_plan_count = Plan_Task::where('task_type', '=', '1')->count();
               // dd($outof_plan_count);
               $no_progress_task = Plan_Task::where('progress', '=', '0')->count();
               $in_progress_and_completed_task = Plan_Task::where('progress', '=', '1')->orWhere('progress', '=', '2')->count();

               $activitieslist = [$no_progress_task, $in_progress_and_completed_task];

               $planed = [$planed_count, $outof_plan_count];

               $plan = json_encode($planed, JSON_NUMERIC_CHECK);
               $activity = json_encode($activitieslist, JSON_NUMERIC_CHECK);

               $data = Plan_Task::all();
               $lastRecordDate = Plan_Task::orderBy('created_at', 'DESC')->take(7)->get();
               $chart = [];
               $chartbar = [];
               $colors = Color::orderBy('plan_start_time', 'asc')->get();
               $team = Directorate::all();


           }
           //score card base on expert chart
           foreach ($colors as $color) {
               $chartbar['series'][] = (int) $data->where('color_id', $color->id)->count();
               $chartbar['name'][] =  $color->name;
               $chartbar['color'][] =  $color->color;
           }

           $chartbar['chart_data']   = json_encode($chartbar);

           //score card base on team chart


           $returnHTML  = view("plan.activities.dashboredDdata", compact('plan', 'planed_count', 'outof_plan_count', 'total_plan_count', 'no_progress_task', 'in_progress_and_completed_task', 'activity', 'today', 'todayexpert', 'noplanexpert', 'chart', 'chartbar', 'lastRecordDate', 'expert_count'))->render();




           return response()->json(array('success' => true, 'html' => $returnHTML));
       }
   }

}
