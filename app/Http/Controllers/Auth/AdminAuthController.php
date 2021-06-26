<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    //
    public function __construct()
    {

    }
    public function showLoginView(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if(Auth::guard('admin')->attempt($credentials)){
            $admin = Auth::guard('admin')->user();
            if($admin->status == 'Active'){
                return redirect()->route('admin.dashboard');
            }else{
                //
                session()->flash('alert-type','alert-danger');
                session()->flash('message','You are already logged in');
                return redirect()->back()->withInput();
            }

        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','The email or password is wrong');
            return redirect()->back()->withInput();
        }


    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('admin.login_view'));
    }

    public function showRegisterView(){
        $states = State::where('status', '=', 'Active')->get();
        return view('admin.auth.register',['states'=>$states]);
    }

    public function register(Request $request) {
        $request->validate([
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|numeric|unique:admins,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
        ]);

        $admin = new Admin();
        $admin->first_name = $request->get('first_name');
        $admin->last_name = $request->get('last_name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->password = bcrypt(request('password'));
        $admin->state_id = $request->get('state_id');
        $admin->birth_date = $request->get('birth_date');
        $admin->gender = $request->get('gender');
        $admin->status = 'Active';

        if ($request->hasFile('image')) {
            $adminImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/admin', $name);
            $admin->image = $name;
        }

        $isSave = $admin->save();
        if($isSave){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Admin created successfully');
            return redirect(route('admin.dashboard'));
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create admin');
            return redirect()->back();
        }
    }
}
