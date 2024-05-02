<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\LatePlanningPermissionsFormRequest;
use App\Models\Late_Planning_Permission;
use App\User;
use Exception;

class LatePlanningPermissionsController extends Controller
{

    /**
     * Display a listing of the late  planning  permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $latePlanningPermissions = Late_Planning_Permission::with('user')->paginate(15);

        return view('plan.late__planning__permissions.index', compact('latePlanningPermissions'));
    }

    /**
     * Show the form for creating a new late  planning  permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('plan.late__planning__permissions.create', compact('users'));
    }

    /**
     * Store a new late  planning  permission in the storage.
     *
     * @param App\Http\Requests\LatePlanningPermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LatePlanningPermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Late_Planning_Permission::create($data);

            return redirect()->route('late__planning__permissions.late__planning__permission.index')
                ->with('success_message', 'Late  Planning  Permission was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified late  planning  permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $latePlanningPermission = Late_Planning_Permission::with('user')->findOrFail($id);

        return view('late__planning__permissions.show', compact('latePlanningPermission'));
    }

    /**
     * Show the form for editing the specified late  planning  permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $latePlanningPermission = Late_Planning_Permission::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('plan.late__planning__permissions.edit', compact('latePlanningPermission','users'));
    }

    /**
     * Update the specified late  planning  permission in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\LatePlanningPermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LatePlanningPermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $latePlanningPermission = Late_Planning_Permission::findOrFail($id);
            $latePlanningPermission->update($data);

            return redirect()->route('late__planning__permissions.late__planning__permission.index')
                ->with('success_message', 'Late  Planning  Permission was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified late  planning  permission from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $latePlanningPermission = Late_Planning_Permission::findOrFail($id);
            $latePlanningPermission->delete();

            return redirect()->route('late__planning__permissions.late__planning__permission.index')
                ->with('success_message', 'Late  Planning  Permission was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
