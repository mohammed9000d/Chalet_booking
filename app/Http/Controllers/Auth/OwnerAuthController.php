<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerAuthController extends Controller
{
    //
        //
        public function __construct()
        {

        }
        public function showLoginView(){
            return view('owner.auth.login');
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

            if(Auth::guard('owner')->attempt($credentials)){
                $owner = Auth::guard('owner')->user();
                if($owner->status == 'Active'){
                    return redirect()->route('owner.dashboard');
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
            Auth::guard('owner')->logout();
            $request->session()->invalidate();
            return redirect()->guest(route('owner.login_view'));
        }

        public function showRegisterView(){
            $states = State::where('status', '=', 'Active')->get();
            return view('owner.auth.register',['states'=>$states]);
        }

        public function register(Request $request) {
            $request->validate([
                'state_id'=>'required|integer|exists:states,id',
                'first_name' => 'required|string|min:3|max:10',
                'last_name' => 'required|string|min:3|max:10',
                'email' => 'required|email|unique:owners,email',
                'mobile' => 'required|numeric|unique:owners,mobile',
                'gender' => 'required|string|in:Male,Female',
                'image' => 'required|image',
            ]);

            $owner = new Owner();
            $owner->first_name = $request->get('first_name');
            $owner->last_name = $request->get('last_name');
            $owner->email = $request->get('email');
            $owner->mobile = $request->get('mobile');
            $owner->password = bcrypt(request('password'));
            $owner->state_id = $request->get('state_id');
            $owner->birth_date = $request->get('birth_date');
            $owner->gender = $request->get('gender');
            $owner->status = 'Active';

            if ($request->hasFile('image')) {
                $ownerImage = $request->file('image');
                $name = time() . '_' . $request->get('first_name') . '.' . $ownerImage->getClientOriginalExtension();
                $ownerImage->move('images/owner', $name);
                $owner->image = $name;
            }

            $isSave = $owner->save();
            if($isSave){
                session()->flash('alert-type','alert-success');
                session()->flash('message','owner created successfully');
                return redirect(route('owner.dashboard'));
            }else{
                session()->flash('alert-type','alert-danger');
                session()->flash('message','Failed to create owner');
                return redirect()->back();
            }
        }
}
