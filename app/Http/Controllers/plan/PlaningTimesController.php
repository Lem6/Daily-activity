<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaningTimesFormRequest;
use App\Models\Planing_Time;
use Exception;

class PlaningTimesController extends Controller
{

    /**
     * Display a listing of the planing  times.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $planingTimes = Planing_Time::paginate(15);

        return view('planing__times.index', compact('planingTimes'));
    }

    /**
     * Show the form for creating a new planing  time.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('planing__times.create');
    }

    /**
     * Store a new planing  time in the storage.
     *
     * @param App\Http\Requests\PlaningTimesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PlaningTimesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Planing_Time::create($data);

            return redirect()->route('planing__times.planing__time.index')
                ->with('success_message', 'Planing  Time was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified planing  time.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $planingTime = Planing_Time::findOrFail($id);

        return view('planing__times.show', compact('planingTime'));
    }

    /**
     * Show the form for editing the specified planing  time.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $planingTime = Planing_Time::findOrFail($id);
        

        return view('planing__times.edit', compact('planingTime'));
    }

    /**
     * Update the specified planing  time in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\PlaningTimesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PlaningTimesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $planingTime = Planing_Time::findOrFail($id);
            $planingTime->update($data);

            return redirect()->route('planing__times.planing__time.index')
                ->with('success_message', 'Planing  Time was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified planing  time from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $planingTime = Planing_Time::findOrFail($id);
            $planingTime->delete();

            return redirect()->route('planing__times.planing__time.index')
                ->with('success_message', 'Planing  Time was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
