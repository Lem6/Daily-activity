<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;
use App\Models\Color;
use Exception;
use Illuminate\Http\Request;
use Alert;
class ColorsController extends Controller
{

    /**
     * Display a listing of the colors.
     *
     * @return Illuminate\View\View
     */
    function __construct()
    {
         $this->middleware('permission:view_color_list', ['only' => ['index']]);
         $this->middleware('permission:color_create', ['only' => ['create','store']]);
         $this->middleware('permission:color_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:color_delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $colors = Color::paginate(15);

        return view('plan.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new color.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('plan.colors.create');
    }

    /**
     * Store a new color in the storage.
     *
     * @param App\Http\Requests\ColorsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'plan_start_time' => 'required',
            'plan_end_time' => 'required',
            'progress_start_time' => 'required',
            'edit_time' => 'required|numeric',
            'color' => 'required',
            'name' => 'required',
        ]);
         try {

            $data = $request->all();

            Color::create($data);
            Alert::success('Success ', 'Color was successfully added');
            return redirect()->route('colors.color.index');


        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request');
            return back();
        }
    }

    /**
     * Display the specified color.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $color = Color::findOrFail($id);

        return view('plan.colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified color.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $color = Color::findOrFail($id);


        return view('plan.colors.edit', compact('color'));
    }

    /**
     * Update the specified color in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ColorsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'plan_start_time' => 'required',
            'plan_end_time' => 'required',
            'progress_start_time' => 'required',
            'edit_time' => 'required|numeric',
            'color' => 'required',
            'name' => 'required',
        ]);

            $data = $request->all();

            $color = Color::findOrFail($id);
            $color->update($data);
            Alert::success('Success ', 'Color was successfully updated');
            return redirect()->route('colors.color.index');


    }


    public function destroy($id)
    {
        try {
            $color = Color::findOrFail($id);
            $color->delete();
            Alert::success('Success ', 'Color was successfully Deleted');
            return redirect()->route('colors.color.index');


        } catch (Exception $exception) {
            Alert::error('Error ', 'Unexpected error occurred while trying to process your request');
            return back();
        }
    }



}
