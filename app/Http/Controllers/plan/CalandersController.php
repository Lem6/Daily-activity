<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalandersFormRequest;
use App\Models\Calander;
use App\Center;
use App\Directorate;
use App\Models\Plan_task;
use Illuminate\Http\Request;
use App\Team;
use App\Models\Color;
use App\User;
use Exception;
use Auth;
use DB;
use Alert;
use App\Traits\Get_All_Employee;
class CalandersController extends Controller
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
     * Display a listing of the calanders.
     *
     * @return Illuminate\View\View
     */
    function __construct()
    {
         $this->middleware('permission:calander_list', ['only' => ['index']]);
         $this->middleware('permission:calander_create', ['only' => ['create','store']]);
         $this->middleware('permission:calander_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:calander_delete', ['only' => ['destroy']]);
    }
    public function index()
    {
       // Alert::error('Error Title', 'Error Message');

     $org=Auth::user()->organazation->id;
    
        $tasks = DB::table('plan__tasks')->where('task_type',2)->where('for_all',$org)->whereYear('created_at', '=', date('Y'))->get()->unique('users');
      

        return view('plan.calanders.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new calander.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
//         $teams = Team::pluck('tid','tid')->all();
// $directorates = Directorate::pluck('did', 'did')->all();
// $centers = Center::pluck('center_name','center_name')->all();

        return view('plan.calanders.create');
    }

    /**
     * Store a new calander in the storage.
     *
     * @param App\Http\Requests\CalandersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $employee=Auth::user();
        //$departments = Organization::with('experts.PlanTask')->find(1);
          $departments=$employee->organazation;
          $this->all_experts  = new \Illuminate\Database\Eloquent\Collection;
          $this->getemployee($departments);
        
    $users  = $this->all_experts; 

  if(!$users){
    Alert::error('Error ', 'Users not found!.');
    return redirect()->back();

  }
  $string = base64_encode(openssl_random_pseudo_bytes(30));   
        //  $date=date("Y-m-d",strtotime($request->input('date')));
$color=Color::orderBy('plan_start_time','asc')->first();
if(!$color){
    Alert::error('Error ', 'planing time not set!.');
    return redirect()->back();

  }
 

        foreach($users as $user){
      
         $task=new plan_task();
         $task->parent_id = $user->organazation->id;
         $task->task_name = $request->task_name;
         $task->created_at = false;
         $task->created_at = $request->date;
         $task->task_type = '2';
         $task->color_id = $color->id;
         $task->progress = '2';
         $task->approved_status = '2';
         $task->user_id = $user->id;
         $task->users = $string;
         $task->for_all = $departments->id;
        
         $task->save();
        }
        Alert::success('Success ', 'Calander Created Successfully.');
            return redirect()->route('calanders.calander.index');
                
         }




    /**
     * Display the specified calander.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $calander = Calander::with('team','directorate','center')->findOrFail($id);

        return view('calanders.show', compact('calander'));
    }

    /**
     * Show the form for editing the specified calander.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $calander = plan_task::findOrFail($id);
       

        return view('plan.calanders.edit', compact('calander'));
    }

    /**
     * Update the specified calander in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CalandersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        try {

            
            $user=$request->user;
$date=date("Y-m-d",strtotime($request->input('date')));

           plan_task::where("users", $user)->update(["task_name" =>$request->task_name,"created_at" =>$date]);
           Alert::success('Success ', 'Calander Updated Successfully.');
            return redirect()->route('calanders.calander.index');
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
               
        }
    }

    /**
     * Remove the specified calander from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $user=$request->user;
       
        try {
            $calander = plan_task::where('users',$user);
            $calander->delete();
            Alert::success('Success ', 'Calander Deleted Successfully.');
            return redirect()->route('calanders.calander.index');
           
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
            
                
        }
    }



}
