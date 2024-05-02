<?php

namespace App\Http\Controllers\plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Alert;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:organizational_unit_list', ['only' => ['index']]);
         $this->middleware('permission:organizational_unit_create', ['only' => ['create','store']]);
         $this->middleware('permission:organizational_unit_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:organizational_unit_delete', ['only' => ['show']]);
    }
    public function index()
    {
        $org_units = Organization::get();
        return view('organizations.index',compact('org_units'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'directorate_name' => 'required',

          'org_id' => 'required',
      ],[
        'org_id.required' => 'the reports to field is required.',
      ]);
      $directorate = new Organization();
      $directorate->name = $request->directorate_name;
      $directorate->parent_id = $request->org_id;
      $directorate->save();
      Alert::success('Success ', 'Unit  Created Successfully.');
      return redirect('/organizations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=\Crypt::decrypt($id);

        $org = Organization::findorfail($id);
        if($org->children->count()>0){

            Alert::warning('Warning ', 'This Unit have another child, Unit Can not be deleted.');
            return back();
        }
        if($org->allemp->count()>0){

            Alert::warning('Warning ', 'There are Employees under this  Unit , Can not be deleted.');
            return back();
        }
        $org->delete();
        Alert::success('Success ', 'Unit  Deleted Successfully.');
        return back();

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'directorate_name' => 'required',

            'org_id' => 'required_unless:org_id,1'
        ],[
          'org_id.required' => 'the reports to field is required.',
        ]);

        $directorate = Organization::findorfail($id);
        $directorate->name = $request->directorate_name;

        if($request->org_id!=1)
        {
            $directorate->parent_id = $request->org_id;
        }
        $directorate->save();
        Alert::success('Success ', 'Unit  Updated Successfully.');
        return redirect('/organizations');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("FDhjgfhj");
        //
    }
}
