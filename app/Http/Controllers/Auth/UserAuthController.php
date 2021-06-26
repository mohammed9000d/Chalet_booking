<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    public function __construct()
    {

    }
    public function showLoginView(){
        return view('website.login');
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

        if(Auth::guard('users')->attempt($credentials)){
            $user = Auth::guard('users')->user();
            if($user->status == 'Active'){
                return redirect()->route('website.index');
            }else{
                //
                session()->flash('alert-type','alert-danger');
                session()->flash('message','انت مسجل الدخول بالفعل');
                return redirect()->back()->withInput();
            }

        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','الايميل او الباسوورد خطأ');
            return redirect()->back()->withInput();
        }


    }

    public function logout(Request $request){
        Auth::guard('users')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('user.login_view'));
    }

    public function showRegisterView(){
        $states = State::where('status', '=', 'Active')->get();
        return view('website.register',['states'=>$states]);
    }

    public function register(Request $request) {
        $request->validate([
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'image',
        ]);

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->password = bcrypt(request('password'));
        $user->state_id = $request->get('state_id');
        $user->birth_date = $request->get('birth_date');
        $user->gender = $request->get('gender');
        $user->status = 'Active';

        if ($request->hasFile('image')) {
            $userImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $userImage->getClientOriginalExtension();
            $userImage->move('images/user', $name);
            $user->image = $name;
        }else {
            $user->image = 'blank-profile-picture-973460_640.png';
        }

        $isSave = $user->save();
        if($isSave){
            session()->flash('alert-type','alert-success');
            session()->flash('message','user created successfully');
            return redirect(route('user.login_view'));
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create user');
            return redirect()->back();
        }
    }
}
