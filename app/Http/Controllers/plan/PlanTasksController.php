<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanTasksFormRequest;
use App\Models\PlanTask;
use App\Models\Plan_Task;
use App\Models\Color;
use App\Models\Motivation;
use App\Models\Organization;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Traits\Get_All_Employee;
use Alert;
class PlanTasksController extends Controller
{
    use Get_All_Employee;
    /**
     * Display a listing of the plan  tasks.
     *
     * @return Illuminate\View\View
     */
    //declar global varable 
    protected  $all_experts ;
    // public function sub_items( $sub_items,$all_experts) {
    //     //merge all child experts 
    //     $this->all_experts = $this->all_experts->merge($sub_items->experts->all());
      
        
    //     if ($sub_items->allChildren)
    // {
    //     if(count($sub_items->allChildren) > 0)
    //     {
    //         foreach ($sub_items->allChildren as $childItems)
    //         {
    //            // get all  child experts
    //             $this->sub_items($childItems,$this->all_experts);
    //          }
    //     }
    
    // }
    
  
    //     }
    public function org()
    {
   
        $employee=Auth::user();
      //$departments = Organization::with('experts.PlanTask')->find(1);
        $departments=$employee->organazation;
        $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
        $this->getemployee($departments);
       
     

  $orgexperts  = $this->all_experts; 
  //$array_experts= $this->all_experts->pluck('id')->toarray();
dd($orgexperts);
    }
    public function dashboard()
    {
    
       $colors=Color::orderBy('plan_start_time','asc')->get();
       $random=Motivation::all();
       if(count($random)>0){
        $random=$random->random(1)->first();
       }
       else{
        $random=0;
       }
   
        
        return view('welcome', compact('colors','random'));
    }
    public function index()
    {
        date_default_timezone_set("Africa/Addis_Ababa");
        $time=strtotime(date("h:i:s",strtotime('-6 hours'))) ;  
        $planTasks = Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
        $colors=Color::orderBy('plan_start_time','asc')->get();
    //    $random=Motivation::all()->random(1)->first();
       
        
        return view('plan.plan__tasks.index', compact('planTasks','time','colors'));
    }
    public function approve()
    {

        // date_default_timezone_set("Africa/Addis_Ababa");
        // $time=strtotime(date("h:i:s",strtotime('-6 hours'))) ;  
        // $planTasks = Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
        $employee=Auth::user();
  
        $departments=$employee->organazation;
        $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
        $this->getemployee($departments);
      
  $users  = $this->all_experts; 
 


        $colors=Color::orderBy('plan_start_time','asc')->get();

        // if(!Auth::user()->teams){
        //     return redirect()->back()->with('toast_error','Your Team is un known Please contact your Sytem Administrator');
        //    }
        //    $users = User::with('todaytask')->Join('team_users', 'team_users.user_id', '=', 'users.id')
        //    ->where('team_users.team_id', '=', Auth::user()->teams->team_id)->where('users.id', '!=', Auth::user()->id)
        //    ->select('users.*')->orderBy('id', 'asc')->get();
        //    if(count($users)=='0'){
        //     return redirect()->back()->with('toast_error','currently thier is no team members.first add your team members');
        //    }

       
       
        return view('plan.plan__tasks.approve', compact('users','colors'));
    }


    public function update_time()
    {

        // date_default_timezone_set("Africa/Addis_Ababa");
        // $time=strtotime(date("h:i:s",strtotime('-6 hours'))) ;  
        // $planTasks = Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
         $colors=Color::orderBy('plan_start_time','asc')->get();
        if(!Auth::user()->teams){
            return redirect()->back()->with('toast_error','Your Team is un known Please contact your Sytem Administrator');
           }
           $users = User::with('todaytask')->Join('team_users', 'team_users.user_id', '=', 'users.id')
           ->where('team_users.team_id', '=', Auth::user()->teams->team_id)->where('users.id', '!=', Auth::user()->id)
           ->select('users.*')->orderBy('id', 'asc')->get();
           if(count($users)=='0'){
            return redirect()->back()->with('toast_error','currently thier is no team members.first add your team members');
           }

       
       
        return view('plan.plan__tasks.update_time', compact('users','colors'));
    }
    /**
     * Show the form for creating a new plan  task.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $approvedBies = ApprovedBy::pluck('id','id')->all();
$users = User::pluck('id','id')->all();
$teams = Team::pluck('id','id')->all();
$directorates = Directorate::pluck('id','id')->all();
$centers = Center::pluck('id','id')->all();
$planTasks = PlanTask::pluck('id','id')->all();
        
        return view('plan..create', compact('approvedBies','users','teams','directorates','centers','planTasks'));
    }

    /**
     * Store a new plan  task in the storage.
     *
     * @param App\Http\Requests\PlanTasksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
         
            'task_name' => 'required',
        ],
        [
         
            'task_name.required'  => 'Task Name is required',
        
        ]);
    
       
         try {
             $color="0";
            date_default_timezone_set("Africa/Addis_Ababa");
            $ptime=date("h:i:s",strtotime('-6 hours'));
           
            $time=strtotime($ptime);

            $plan_time=Color::orderBy('plan_start_time','asc')->get();

            
            foreach($plan_time as $plan_time){
               if($time >= $plan_time->PlanStart && $time <= $plan_time->PlanEnd){
                  $color=$plan_time->id;
    
                  break;  
               }
               
                   }
    
            if(!$color){
                Alert::warning('warning ', 'Plan Not Allowed At this time!Please communicate with your Immediate Supervisor.');
                return redirect()->back();

                       }
       
                      
        
            $data = $request->all();
            $data['color_id']=$color;
            $data['planing_time']=$ptime;
            $data['user_id']=Auth::user()->id;
            $data['parent_id']=Auth::user()->organization_id;
            $task=Plan_Task::create($data);
            Alert::success('Success ', 'Plan Created Successfully.');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }
    }


    public function outplan(Request $request)
    {
        $request->validate([
         
            'task_name' => 'required',
            'given_by' => 'required',
        ],
        [
         
            'task_name.required'  => 'Task Name is required',
            'given_by.required'  => 'Assigned by is requeied',
        
        ]);
    
       
         try {
             $color="0";
             date_default_timezone_set("Africa/Addis_Ababa");
        $time=date("h:i:s",strtotime('-6 hours')) ; 

            $plan_time=Color::orderBy('plan_start_time','asc')->first();

            
        
               if($plan_time){

                  $color=$plan_time->id;
                    }
               
                 
    
            if(!$color){
                Alert::error('Error', 'Planing time not set.contact your Imediate Supervisor');
                return redirect()->back();

                       }
       
          
          
            $data = $request->all();
            $data['color_id']=$color;
            $data['planing_time']=$time;
            $data['progress_time']=$time;
            $data['user_id']=Auth::user()->id;
            $data['parent_id']=Auth::user()->organization_id;
            $data['task_type']='1';
            $data['progress']='2';
            $task=Plan_Task::create($data);
            Alert::success('Success', 'Plan Created Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }
    }
    /**
     * Display the specified plan  task.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $planTask = Plan_Task::with('approvedby','user','team','directorate','center','plantask')->findOrFail($id);

        return view('plan..show', compact('planTask'));
    }

    /**
     * Show the form for editing the specified plan  task.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $planTask = Plan_Task::findOrFail($id);
        $approvedBies = ApprovedBy::pluck('id','id')->all();
$users = User::pluck('id','id')->all();
$teams = Team::pluck('id','id')->all();
$directorates = Directorate::pluck('id','id')->all();
$centers = Center::pluck('id','id')->all();
$planTasks = PlanTask::pluck('id','id')->all();

        return view('plan..edit', compact('planTask','approvedBies','users','teams','directorates','centers','planTasks'));
    }

    /**
     * Update the specified plan  task in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\PlanTasksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {  
        
        $request->validate([
         
        'task_name' => 'required',
    ],
    [
     
        'task_name.required'  => 'Task Name is required',
    
    ]);
     
        try {
            date_default_timezone_set("Africa/Addis_Ababa");
        $time=strtotime(date("h:i:s",strtotime('-6 hours'))) ; 
            
            $data = $request->all();
            
            $planTask = Plan_Task::findOrFail($id);
            $ptime=strtotime($planTask->planing_time.' + '.$planTask->color->edit_time.' minute');
            if($ptime<=$time && $planTask->approved_status=='0' ){
                Alert::warning('Warning', 'Timeout. Can not Update  the Task');
                return redirect()->back();  
            }
            if($planTask->approved_status=='1'){
                $planTask->edit_status='1';
            }
            $planTask->approved_status='0';

         
          

            $planTask->update($data);
            Alert::success('success', 'Plan Updated Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }   
    }
    public function inprogress($id, Request $request)
    {
        $request->validate([
            'percent' => 'required|integer|between:1,100',
            'description' => 'required',
        ],
        [
            'percent.between'  => 'please set a progress',
            'description.required'  => 'description is required',
        
        ]);
    
        try {
            date_default_timezone_set("Africa/Addis_Ababa");
        $time=date("h:i:s",strtotime('-6 hours')) ; 
            
            $data = $request->all();
            $data['progress_time']=$time;
            $data['progress']='1';
            $planTask = Plan_Task::findOrFail($id);
            if($planTask->approved_status=='1'){
                $planTask->edit_status='1';
            }
            $planTask->approved_status='0';
           
          
            $planTask->update($data);
            Alert::success('success', 'Report Inserted  Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }   
    }

    public function approve_reject(Request $request)
    {
     
      
        $request->validate([
            'reject_reason' => 'required',
          
        ],
        [
            'reject_reason.required'  => 'please insert reason for rejection',
         
        
        ]);
    
        try {
            $tasks=$request->task;

            if(count($tasks)=='0'){
                return redirect()->back()->with('toast_error','Select at least  one plan.');   
            }
            
           foreach ($tasks as $task_id) {
            $planTask = Plan_Task::findOrFail($task_id);
            $planTask->approved_by=Auth::user()->id;
            $planTask->edit_status='0';
            if($request->reject_reason=='true'){
                $planTask->approved_status='2';
                $status='Approved';
            }
            else{
                $planTask->approved_status='1';
                $planTask->reject_reason=$request->reject_reason;
                $status='Rejected';
            }      
           
            $planTask->save();
               
           }
            
           Alert::success('success', 'Report '.$status.'  Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }   
    }
    public function completed($id, Request $request)
    {
    
        try {
            date_default_timezone_set("Africa/Addis_Ababa");
            $time=date("h:i:s",strtotime('-6 hours')) ; 
           
            
            
            $planTask = Plan_Task::findOrFail($id);
            $planTask->progress='2';
            $planTask->percent='Null';
            $planTask->description='Null';
            $planTask->challenge='Null';
            $planTask->progress_time=$time;
            if($planTask->approved_status=='1'){
                $planTask->edit_status='1';
            }
            $planTask->approved_status='0';
           
           
            $planTask->save();

            Alert::success('success', 'Report Inserted  Successfully');

            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }   
    }


    public function ongoing($id, Request $request)
    {
    
        try {
            date_default_timezone_set("Africa/Addis_Ababa");
            $time=date("h:i:s",strtotime('-6 hours')) ; 
           
         
            $planTask = Plan_Task::findOrFail($id);
            $planTask->progress='0';
            $planTask->percent='Null';
            $planTask->description='Null';
            $planTask->challenge='Null';
            $planTask->progress_time=$time;
            $planTask->save();

            
            Alert::success('success', 'Report Inserted  Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }   
    }
    /**
     * Remove the specified plan  task from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
      
        try {
            date_default_timezone_set("Africa/Addis_Ababa");
            $time=strtotime(date("h:i:s",strtotime('-6 hours'))) ; 

            $planTask = Plan_Task::findOrFail($id);
            $ptime=strtotime($planTask->planing_time.' + '.$planTask->color->edit_time.' minute');
            if($ptime<=$time && $planTask->approved_status=='0'){
                Alert::error('Error', 'Timeout. Can not Delete  the Task');
                return redirect()->back();  
            }
            $planTask->delete();
            Alert::success('Success', 'Plan Deleted Successfully');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }
    }



}
