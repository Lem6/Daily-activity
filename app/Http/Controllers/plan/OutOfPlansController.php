<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\OutOfPlansFormRequest;
use App\Models\ApprovedBy;
use App\Models\Center;
use App\Models\Directorate;
use App\Models\Out_of_plan;
use App\Models\Team;
use App\Models\User;
use Exception;

class OutOfPlansController extends Controller
{

    /**
     * Display a listing of the out of plans.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $outOfPlans = Out_of_plan::with('user','team','directorate','center','approvedby')->paginate(15);

        return view('out_of_plans.index', compact('outOfPlans'));
    }

    /**
     * Show the form for creating a new out of plan.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
$teams = Team::pluck('id','id')->all();
$directorates = Directorate::pluck('id','id')->all();
$centers = Center::pluck('id','id')->all();
$approvedBies = ApprovedBy::pluck('id','id')->all();
        
        return view('out_of_plans.create', compact('users','teams','directorates','centers','approvedBies'));
    }

    /**
     * Store a new out of plan in the storage.
     *
     * @param App\Http\Requests\OutOfPlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(OutOfPlansFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Out_of_plan::create($data);

            return redirect()->route('out_of_plans.out_of_plan.index')
                ->with('success_message', 'Out Of Plan was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified out of plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $outOfPlan = Out_of_plan::with('user','team','directorate','center','approvedby')->findOrFail($id);

        return view('out_of_plans.show', compact('outOfPlan'));
    }

    /**
     * Show the form for editing the specified out of plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $outOfPlan = Out_of_plan::findOrFail($id);
        $users = User::pluck('id','id')->all();
$teams = Team::pluck('id','id')->all();
$directorates = Directorate::pluck('id','id')->all();
$centers = Center::pluck('id','id')->all();
$approvedBies = ApprovedBy::pluck('id','id')->all();

        return view('out_of_plans.edit', compact('outOfPlan','users','teams','directorates','centers','approvedBies'));
    }

    /**
     * Update the specified out of plan in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\OutOfPlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, OutOfPlansFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $outOfPlan = Out_of_plan::findOrFail($id);
            $outOfPlan->update($data);

            return redirect()->route('out_of_plans.out_of_plan.index')
                ->with('success_message', 'Out Of Plan was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified out of plan from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $outOfPlan = Out_of_plan::findOrFail($id);
            $outOfPlan->delete();

            return redirect()->route('out_of_plans.out_of_plan.index')
                ->with('success_message', 'Out Of Plan was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
