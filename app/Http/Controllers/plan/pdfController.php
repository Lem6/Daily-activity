<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan_Task;
use App\Models\Color;
use PDF;
use Exception;
use Auth;
use DB;
class pdfController extends Controller
{
    public function generatePDF(Request $request)
    {

        // try {
  

   $from=date("Y-m-d",strtotime($request->input('from_date')));
   $to=date("Y-m-d",strtotime($request->input('to_date')));
   $task =  Plan_Task::with('color')->where('user_id',Auth::user()->id)->whereBetween('created_at',[$from,$to])->orderBy('created_at','asc')->get();
   $colors=Color::orderBy('plan_start_time','asc')->get();
  
   $color_status = [];
 
   foreach($colors as $color) {
      $color_status['total'][] = (int) $task->where('color_id',$color->id)->count();
      $color_status['name'] []=  $color->name;
      $color_status['color'][] =  $color->color;
    }
    // $color_status=json_encode($color_status);
$completed=$task->where('progress',2)->where('approved_status',2)->count();
$notreported=$task->where('progress',0)->count();
$notapproved=$task->where('approved_status',0)->count();
$rejected=$task->where('approved_status',1)->count();
$perm=$task->where('task_type',3)->count();
$plan=$task->where('task_type',0)->count();
$oplan=$task->where('task_type',1)->count();
$all=$task->where('task_type',2)->count();
$total=$task->count();
   
        $data = [
            'color_status' => $color_status,
            'completed' => $completed,
            'notreported' => $notreported,
            'notapproved' => $notapproved,
            'rejected' => $rejected,
            'perm' => $perm,
            'plan' => $plan,
            'oplan' => $oplan,
            'all' => $all,
            'total' => $total,
            'from' => $from,
            'to' => $to,
            'task' => $task,
          
        ];


        //return view('plan.myPDF',$data);
        $pdf = PDF::loadView('plan.myPDF', $data)->output();
        return response()->streamDownload(
             fn () => print($pdf),
             Auth::user()->name.'_tasklist.pdf'
        );
        //return view('plan.myPDF',$data);
       // $pdf = PDF::loadView('plan.myPDF', $data);
  //dd($pdf);
       // return $pdf->download(Auth::user()->name.'_tasklist.pdf');
    // } catch (Exception $exception) {

    //     return back()->withInput()->with('toast_error','Unexpected error occurred while trying to process your request.');
        
    // }
    }
}
