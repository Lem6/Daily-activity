<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Session;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Organization;
use App\Models\Logo;
use Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user_list', ['only' => ['index']]);
         $this->middleware('permission:user_create', ['only' => ['create','store']]);
         $this->middleware('permission:user_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user_activation', ['only' => ['activate','deactivate']]);
    }
    public function index(Request $request)
    {
        $data = User::orderBy('name','asc')->get();
        Log::info(Auth::user()->name.' view List of user account information');
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $org_units = Organization::get();

        return view('users.create',compact('roles','org_units'));
    }


    public function view_logo()
    {

        $logo=Logo::findorfail('1');
        return view('logo',compact('logo'));

    }
    public function update_logo(Request $request)
    {
        $this->validate($request, [

            'logo' => 'required_without:old_logo|nullable|max:10000',

        ]);
        if( $request->hasFile('logo') ){
            $image = $request->file('logo')->store('logo', 'public');
        }
        else{
            $image= $request->old_logo;
        }
        $logo=Logo::findorfail('1');
        $logo->logo=$image;

        $logo->save();
        Log::info(Auth::user()->name.' Updated System Logo');
        Alert::success('success ', 'Logo updated succesfully!');
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'organization_id'=> 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        Log::alert(Auth::user()->name.' create new  user account for '.$request->name);
        Alert::success('success ', 'User created successfully');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $org_units = Organization::get();

        return view('users.edit',compact('user','roles','userRole','org_units'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'organization_id'=> 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $input['firts_time'] = 0;
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        Log::alert(Auth::user()->name.' update   user account information for '.$request->name);
        Alert::success('success ', 'User information updated successfully');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        // Log::critical(Auth::user()->name.' deleted user account of '.$User->name);
        Alert::success('success ', 'User deleted successfully');
        return redirect()->route('users.index');

    }
    public function logout()
    {
    $logouttime=Carbon::now();
    $log=User::where('id',Auth::user()->id)->first();

    Log::alert('Full Name: '.$log->name.' Email: '.$log->email.' ip address: '.$log->last_login_ip.' Login time: '.$log->last_login_at.' Logout time: '.$logouttime);
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function change_password()
    {
     return view('users.chang_password');
     }

     public function set_new_password(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            Alert::error('Error ', 'Current password does not match!');
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->firts_time = 1;
        $user->save();
        Log::info(Auth::user()->name.' Change thier own password');
        \Auth::logout();
        //Password updated! LOGIN again with updated password
        Alert::success('Success ', 'password changed successfully');
        return redirect()->to('/login');
    }

    public function activate($user)
    {
        //
        $user=User::find($user);
        $user->active=0;
        $user->save();
        Log::alert(Auth::user()->name.' Deactivated   user account of '.$user->name);
        Alert::success('Success ', 'User account Deactivated successfully');
        return back();


    }

    public function deactivate($user)
    {
        $user=User::find($user);
        $user->active=1;
        $user->save();
        Log::alert(Auth::user()->name.' Activated   user account of '.$user->name);
        Alert::success('Success ', 'User account Activated successfully');
        return back();

    }
}
