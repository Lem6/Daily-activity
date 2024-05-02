<?php
namespace App\Http\Controllers\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Alogo;

class AuthController extends Controller
{
    /**
     *  Show login View
     */
   // authentication for plan
   public function plan_login(){

    return view('plan.auth.index');
}
public function plan_authenticate(Request $request)
{

    $this->validate($request,[
        'email' => 'required|email|min:6',
        'password' => 'required|min:7',
    ]);

    //try to login the user
    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->has('remember'))) {
        // Authentication passed...
        return redirect()->route('plan_dashboard');
    }else{
        // Authentication failed...
        //redirect the user with the old input
        return redirect()->back()->withInput()->with('toast_error','Invalid Credential');
    }
}
    public function logout()
    {
        //logout the user
        Auth::logout();

        return redirect('/site_admin')->with('toast_success','Successfully logged out!');
    }

    /**
     *  show details of authenticated user
     */
    public function show(){
        $alogo=Alogo::get();
        return view('auth.show',compact('alogo'));
    }
}
