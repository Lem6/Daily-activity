<?php
namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdditionalTimesFormRequest;
use Illuminate\Http\Request;
use App\Models\Additional_Time;
use App\Models\plan_task;
use App\Models\User;
use Auth;
use App\Models\Color;
use Exception;
use App\Traits\Get_All_Employee;
use Alert;

class AdditionalTimesController extends Controller
{
    use Get_All_Employee;
    /**
     * Display a listing of the plan  tasks.
     *
     * @return Illuminate\View\View
     */
    //declar global varable 
    protected  $all_experts ;
    /**
     * Display a listing of the additional  times.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $employee=Auth::user();
        //$departments = Organization::with('experts.PlanTask')->find(1);
          $departments=$employee->organazation;
          $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
          $this->getemployee($departments);
        
    $users  = $this->all_experts; 
           if(count($users)=='0'){
            Alert::error('Error ', 'currently thier is no experts under your Organizations.');
            return redirect()->back()->with('toast_error','currently thier is no team members.first add your team members');
           }

$colors=Color::orderBy('plan_start_time','asc')->get();
         
        return view('plan.additional__times.index', compact('users','colors'));
    }

    /**
     * Show the form for creating a new additional  time.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('additional__times.create', compact('users'));
    }

    /**
     * Store a new additional  time in the storage.
     *
     * @param App\Http\Requests\AdditionalTimesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $color_id = $request->color_id;
            $reason = $request->reason;
            $users = $request->user;

            $date=date('Y-m-d');
            
            
           foreach($users as $user){
            $permission=new Additional_Time();
            $permission->user_id=$user;
            $permission->color_id=$color_id;
            $permission->reason=$reason;
            $permission->date=$date;
            $permission->given_by=Auth::user()->id;
            $permission->save();

            $task=Plan_Task::where('created_at',$date)->where('user_id',$user)->first();
            if($task){
                $task->color_id=$color_id;
                $task->task_type='3';
                $task->save();
            }
           }
           Alert::success('Success ', 'Plan time Changed Successfully.');
           return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
        }
    }

    /**
     * Display the specified additional  time.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $additionalTime = Additional_Time::with('user')->findOrFail($id);

        return view('additional__times.show', compact('additionalTime'));
    }
    public function view_assigned_permission()
    {
        $additionalTimes = Additional_Time::with('user','supervisor')->get();
        return view('plan.additional__times.view_permission', compact('additionalTimes'));
    }
    
    /**
     * Show the form for editing the specified additional  time.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        
        $user = User::with('permission.color')->find($id);
        

$colors=Color::get();

        return view('plan.additional__times.edit', compact('user','colors'));
    }

    /**
     * Update the specified additional  time in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\AdditionalTimesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
        $color_id = $request->color_id;
        
        $reason = $request->reason;
        
        $pid = $request->pid;
        $date=date('Y-m-d');
        $permission= Additional_Time::find($pid);
        $permission->color_id=$color_id;
        $permission->reason=$reason;
        $permission->save();

        $task=Plan_Task::where('created_at',$date)->where('user_id',$id)->first();
        if($task){
            $task->color_id=$color_id;
            $task->save();
        }
        Alert::success('Success ', 'Plan time Changed Successfully.');
        return redirect()->route('additional__times.additional__time.index');
       
    } catch (Exception $exception) {
        Alert::error('Error ', 'Unexpected error occurred while trying to process your request');
        return back()->withInput();
        
    }     
    }

    /**
     * Remove the specified additional  time from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $additionalTime = Additional_Time::findOrFail($id);
            $additionalTime->delete();
            Alert::success('Success ', 'Additional  Time was successfully deleted');
            return redirect()->route('additional__times.additional__time.index');
           
               
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request');
            return back()->withInput();
               
        }
    }



}
