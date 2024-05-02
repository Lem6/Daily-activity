<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotivationsFormRequest;
use App\Models\Motivation;
use Exception;
use Illuminate\Http\Request;
use Alert;
class MotivationsController extends Controller
{

    /**
     * Display a listing of the motivations.
     *
     * @return Illuminate\View\View
     */
    function __construct()
    {
         $this->middleware('permission:motivation_list', ['only' => ['index']]);
         $this->middleware('permission:motivation_create', ['only' => ['create','store']]);
         $this->middleware('permission:motivation_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:motivation_delete', ['only' => ['show']]);
    }
    public function index()
    {
        $motivations = Motivation::paginate(15);
       
       
        return view('plan.motivations.index', compact('motivations'));
    }

    /**
     * Show the form for creating a new motivation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('motivations.create');
    }

    /**
     * Store a new motivation in the storage.
     *
     * @param App\Http\Requests\MotivationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        try {
            
            $data = $request->all();
            
            Motivation::create($data);
            Alert::success('success ', 'Motivation Inserted Successfully.');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
             
        }
    }

    /**
     * Display the specified motivation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $motivation = Motivation::findOrFail($id);

        return view('motivations.show', compact('motivation'));
    }

    /**
     * Show the form for editing the specified motivation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $motivation = Motivation::findOrFail($id);
        

        return view('motivations.edit', compact('motivation'));
    }

    /**
     * Update the specified motivation in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\MotivationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MotivationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $motivation = Motivation::findOrFail($id);
            $motivation->update($data);
            Alert::success('success ', 'Motivation Updated Successfully.');
            return redirect()->back();
        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request.');
            return back()->withInput();
             
        }  
    }

    /**
     * Remove the specified motivation from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $motivation = Motivation::findOrFail($id);
            $motivation->delete();

            return redirect()->back()->with('toast_error','Motivation Deleted Successfully');
        } catch (Exception $exception) {

            return back()->withInput()->with('toast_error','Unexpected error occurred while trying to process your request.');
             
        }
    }



}
