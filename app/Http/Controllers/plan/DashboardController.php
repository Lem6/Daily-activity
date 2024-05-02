<?php

namespace App\Http\Controllers\plan;

use App\BusinessCase;
use App\Center;
use App\Directorate;
use App\DirectorUser;
use App\Http\Controllers\Controller;
use App\Logo;
use App\Module;
use App\Permission;
use App\PmoUser;
use App\ProjectMember;
use App\Role;
use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    /**
     *  Only authenticated users can access this controller
     */


    /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
       
        $director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')

        ->select('director_members.*','users.*')->first();

        $current_id=Auth::user()->id;
        $case=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
        ->select('business_cases.*','users.*')->where('business_director_id', $current_id)->paginate(1);

        $team_members1=ProjectMember::Join('users', 'users.id', '=', 'project_members.member_id')->get();

        //show logo
        $logo =Logo::get();
         //count no of users
        $t_admins = User::all()->count();
         //count no of roles
        $t_roles = Role::all()->count();
         //count no of permissions
        $t_permissions = Permission::all()->count();

        $t_directorates = Directorate::all()->count();

        $t_centers = Center::all()->count();

          //count no of members under each director
        $req_id=Auth::user()->id;
        if(Auth::user()->hasRole('director')){
            $users = DirectorUser::where('user_id',$req_id)->first();
            $t_director_members = User::Join('director_members', 'director_members.members_id', '=', 'users.id')
            ->where('director_members.directorate_id','=', $users->directorate_id)
            ->select('director_members.*','users.*')->count();

            $t_manager=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
                          ->select('business_cases.*','users.*')->where('business_director_id',$req_id)->count();
           }
        else{
            $t_director_members="";
            $t_manager="";
        }

           //count no of buisness cases of each director
        $t_business_case = BusinessCase::where('business_director_id',$req_id)->get()->count();
           //count no of business cases assigned to a specific project manager
        $t_approved_business_case = BusinessCase::where('manager_id',$req_id)->where('b_status',1)->count();

           //count no of team members under a project manager
        $t_approved_business_case1 = BusinessCase::where('manager_id',$req_id)->where('b_status',1)->get();
        $project_member=ProjectMember::get();
        $total_member=0;
     foreach ($t_approved_business_case1 as $key => $value) {
         foreach ($project_member->where('project_id',$value->bid) as $key => $value1) {
                $total_member+=1;
         }
     }

       //count no of business cases of each project manager members
        $t_project_member_project=ProjectMember::Join('business_cases','business_cases.bid' , '=', 'project_members.project_id')
        ->select('business_cases.*','project_members.*')->where('member_id',$req_id)->count();

         //count nomodules for each project manager
        $t_modules=Module::Join('business_cases','business_cases.bid' , '=', 'modules.project_id')
        ->select('business_cases.*','modules.*')->where('user_id',$req_id)->count();

        $t_tasks=Task::Join('modules','modules.mid' , '=', 'tasks.module_id')
        ->select('tasks.*','modules.*')->where('tasks.user_id',$req_id)->count();


        $t_modules_ex=Module::Join('users', 'users.id', '=', 'modules.user_id')
        ->join('module_teams','module_teams.module_id', '=', 'modules.mid')
        ->select('modules.*','users.*','module_teams.*')->where('team_id',$current_id)->count();

          //count no of buisness cases of Pmo Director
          $t_business_case_pmod=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
          ->select('business_cases.*','users.*')->count();

            //count no of Approved buisness cases of  Pmo Director
          $t_business_case_approved=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
          ->select('business_cases.*','users.*')->where('b_status',1)->count();
           //count no of Rejected buisness cases of  Pmo Director
          $t_business_case_rejected=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
          ->select('business_cases.*','users.*')->where('b_status',2)->count();
             //count no of Pending buisness cases of  Pmo Director
          $t_business_case_pending=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
          ->select('business_cases.*','users.*')->where('b_status',0)->count();

          $t_assigned_expert=PmoUser::Join('users', 'users.id', '=', 'pmo_users.expert_id')
            ->select('pmo_users.*','users.*')->count();


            $t_pmo_members = User::where('type',9)->count();

            $activity = Activity::orderBy('id', 'desc')->paginate(4);
             $year=date('Y');
             $current_year=date('Y');
//director
            $t_business_case_chart = BusinessCase::where('business_director_id',$req_id)->where('created_at', 'like', '%'.$year.'%')->get();
            $jan=0;
            $feb=0;
            $mar=0;
            $apr=0;
            $may=0;
            $jun=0;
            $jul=0;
            $aug=0;
            $sep=0;
            $oct=0;
            $nov=0;
            $dec=0;

            foreach($t_business_case_chart as $emonth)
            {

                $string = "$emonth->created_at";

          $array  = explode("-", $string);
          $supermonth=$array[1];

          if($supermonth=="01")
          {
              $jan+=1;
          }

          elseif($supermonth=="02")
          {
              $feb+=1;
          }

          elseif($supermonth=="03")
          {
              $mar+=1;
          }

          elseif($supermonth=="04")
          {
              $apr+=1;
          }

          elseif($supermonth=="05")
          {
              $may+=1;
          }

          elseif($supermonth=="06")
          {
              $jun+=1;
          }

          elseif($supermonth=="07")
          {
              $jul+=1;
          }

          elseif($supermonth=="08")
          {
              $aug+=1;
          }

          elseif($supermonth=="09")
          {
              $sep+=1;
          }

          elseif($supermonth=="10"){
              $oct+=1;
          }

          elseif($supermonth=="11")
          {
              $nov+=1;
          }

          elseif($supermonth=="12")
          {
              $dec+=1;
          }



            }



              $proposed= [$jan, $feb, $mar,$apr, $may, $jun,$jul, $aug, $sep,$oct, $nov, $dec];



              //pmo Director
              $t_business_case_pmod_chart=BusinessCase::Join('users', 'users.id', '=', 'business_cases.manager_id')
              ->where('business_cases.created_at', 'like', '%'.$year.'%')
              ->select('business_cases.*','users.*')->get();

            $feb=0;
            $mar=0;
            $apr=0;
            $may=0;
            $jun=0;
            $jul=0;
            $aug=0;
            $sep=0;
            $oct=0;
            $nov=0;
            $dec=0;

            foreach($t_business_case_pmod_chart as $emonth)
            {

                $string = "$emonth->created_at";

          $array  = explode("-", $string);
          $supermonth=$array[1];

          if($supermonth=="01")
          {
              $jan+=1;
          }

          elseif($supermonth=="02")
          {
              $feb+=1;
          }

          elseif($supermonth=="03")
          {
              $mar+=1;
          }

          elseif($supermonth=="04")
          {
              $apr+=1;
          }

          elseif($supermonth=="05")
          {
              $may+=1;
          }

          elseif($supermonth=="06")
          {
              $jun+=1;
          }

          elseif($supermonth=="07")
          {
              $jul+=1;
          }

          elseif($supermonth=="08")
          {
              $aug+=1;
          }

          elseif($supermonth=="09")
          {
              $sep+=1;
          }

          elseif($supermonth=="10"){
              $oct+=1;
          }

          elseif($supermonth=="11")
          {
              $nov+=1;
          }

          elseif($supermonth=="12")
          {
              $dec+=1;
          }



            }



              $proposed_pmo_director= [$jan, $feb, $mar,$apr, $may, $jun,$jul, $aug, $sep,$oct, $nov, $dec];
             //dd($proposed_pmo_director);
             //project_manager

             $t_approved_business_case_chart = BusinessCase::where('manager_id',$req_id)->where('business_cases.created_at', 'like', '%'.$year.'%')->where('b_status',1)->get();
             $feb=0;
             $mar=0;
             $apr=0;
             $may=0;
             $jun=0;
             $jul=0;
             $aug=0;
             $sep=0;
             $oct=0;
             $nov=0;
             $dec=0;

             foreach($t_approved_business_case_chart as $emonth)
             {

                 $string = "$emonth->created_at";

           $array  = explode("-", $string);
           $supermonth=$array[1];

           if($supermonth=="01")
           {
               $jan+=1;
           }

           elseif($supermonth=="02")
           {
               $feb+=1;
           }

           elseif($supermonth=="03")
           {
               $mar+=1;
           }

           elseif($supermonth=="04")
           {
               $apr+=1;
           }

           elseif($supermonth=="05")
           {
               $may+=1;
           }

           elseif($supermonth=="06")
           {
               $jun+=1;
           }

           elseif($supermonth=="07")
           {
               $jul+=1;
           }

           elseif($supermonth=="08")
           {
               $aug+=1;
           }

           elseif($supermonth=="09")
           {
               $sep+=1;
           }

           elseif($supermonth=="10"){
               $oct+=1;
           }

           elseif($supermonth=="11")
           {
               $nov+=1;
           }

           elseif($supermonth=="12")
           {
               $dec+=1;
           }



             }



               $proposed_project_manager= [$jan, $feb, $mar,$apr, $may, $jun,$jul, $aug, $sep,$oct, $nov, $dec];
              //dd($proposed_project_manager);
              //project_manager

              $t_tasks_1=Task::Join('modules','modules.mid' , '=', 'tasks.module_id')
              ->where('tasks.created_at', 'like', '%'.$year.'%')
              ->select('tasks.*','modules.*')->where('tasks.user_id',$req_id)->get();

              $feb=0;
              $mar=0;
              $apr=0;
              $may=0;
              $jun=0;
              $jul=0;
              $aug=0;
              $sep=0;
              $oct=0;
              $nov=0;
              $dec=0;

              foreach($t_tasks_1 as $emonth)
              {

                  $string = "$emonth->created_at";

            $array  = explode("-", $string);
            $supermonth=$array[1];

            if($supermonth=="01")
            {
                $jan+=1;
            }

            elseif($supermonth=="02")
            {
                $feb+=1;
            }

            elseif($supermonth=="03")
            {
                $mar+=1;
            }

            elseif($supermonth=="04")
            {
                $apr+=1;
            }

            elseif($supermonth=="05")
            {
                $may+=1;
            }

            elseif($supermonth=="06")
            {
                $jun+=1;
            }

            elseif($supermonth=="07")
            {
                $jul+=1;
            }

            elseif($supermonth=="08")
            {
                $aug+=1;
            }

            elseif($supermonth=="09")
            {
                $sep+=1;
            }

            elseif($supermonth=="10"){
                $oct+=1;
            }

            elseif($supermonth=="11")
            {
                $nov+=1;
            }

            elseif($supermonth=="12")
            {
                $dec+=1;
            }



              }



                $t_tasks_chart= [$jan, $feb, $mar,$apr, $may, $jun,$jul, $aug, $sep,$oct, $nov, $dec];
            //    dd($t_tasks_chart);
               //project_manager


// KB side dashboard content start

            $req_id=Auth::user()->id;
            if(Auth::user()->hasRole('director')){
                $users = DirectorUser::where('user_id',$req_id)->first();
$t_Documents = User::Join('documents', 'documents.user_id', '=', 'users.id')
                ->select('documents.*','users.*')->where('user_id',$req_id)->count();



 $t_Template=User::Join('templates', 'templates.user_id', '=', 'users.id')
                              ->select('templates.*','users.*')->where('user_id',$req_id)->count();
               }
            else{
                $t_Documents="";
                $t_Template="";
            }

// KB side dashboard content end

        return view('plan.dashboard.index')
            ->with([
                'activity'=>$activity,
                'case'=>$case,
                'director_members'=>$director_members,
                'team_members1'=>$team_members1,

                't_admins'        =>  $t_admins,
                't_roles'        =>  $t_roles,
                't_permissions'        =>  $t_permissions,
                't_directorates' =>  $t_directorates,
                't_centers' =>$t_centers,
                't_director_members'        =>  $t_director_members,
                't_manager'        =>  $t_manager,
                't_business_case'=> $t_business_case,
                't_approved_business_case'=>$t_approved_business_case,
                't_project_member_project' =>$t_project_member_project,
                'total_member' =>$total_member,
                't_modules' =>$t_modules,
                't_business_case_pmod' =>$t_business_case_pmod,
                't_business_case_approved'=>$t_business_case_approved,
                't_business_case_rejected'=>$t_business_case_rejected,
                't_business_case_pending'=>$t_business_case_pending,
                't_assigned_expert'=>$t_assigned_expert,
                't_pmo_members'=>$t_pmo_members,
                'logo' => $logo,
                'proposed'=>$proposed,
                'proposed_pmo_director'=>$proposed_pmo_director,
                'proposed_project_manager'=>$proposed_project_manager,
                'current_year'=>$current_year,
                't_tasks'=>$t_tasks,
                't_tasks_chart'=>$t_tasks_chart,
                't_modules_ex'=>$t_modules_ex,
// KB side contents start


                    't_Documents'=>$t_Documents,
                    't_Template'=>$t_Template,

// KB side content ends

            ]);




    }

    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }

    public function show($id)
    {
        $activity = Activity::find($id);
        return view('admin.dashboard.show',compact('activity'));
    }
}
