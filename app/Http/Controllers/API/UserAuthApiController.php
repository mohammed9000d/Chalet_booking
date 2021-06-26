<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthApiController extends Controller
{

    // USER REGISTER

    public function register(Request $request){
        $validator = Validator::make($request->all(), User::roles());
        if(!$validator->fails()){
            $user = new User();
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->mobile = $request->get('mobile');
            $user->password = bcrypt(request('password'));
            $user->state_id = $request->get('state_id');
            $user->birth_date = $request->get('birth_date');
            $user->gender = $request->get('gender');
            $user->status = $request->has('status')?'Active':'InActive';
            if ($request->hasFile('image')) {
                $userImage = $request->file('image');
                $name = time() . '_' . $request->get('first_name') . '.' . $userImage->getClientOriginalExtension();
                $userImage->move('images/user', $name);
                $user->image = $name;
            }
            $isSave = $user->save();
            if($isSave){
                return $this->generateToken($user, 'REGISTERED_SUCCESSFULLY');
            }else{
                return ControllerHelper::generateResponse(false, 'Faled to register');
            }
        }else{
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }


    // USER LOGIN

    public function login(Request $request)
    {
        $roles = [
            'email' => 'required|email|string|exists:users',
            'password' => 'required|'
        ];
        $validator = Validator::make($request->all(), $roles);
        if(!$validator->fails()){
            $user = User::where('email', $request->get('email'))->first();

            if(Hash::check($request->get('password'), $user->password)){

                if($this->checkActiveToken($user->id)){
                    return ControllerHelper::generateResponse(false,'Login denied, thire is an active access!');
                }else{
                return $this->generateToken($user, 'LOGGED_IN_SUCCESSFULLY');
                }

            }else{
                return ControllerHelper::generateResponse(false, 'Error credentials');
            }

        }else{
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }

    // USER LOGOUT

    public function logout(Request $request){
        $request->user('user')->token()->revoke();
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
        ]);

    }

    private function checkActiveToken($userId){
        return DB::table('oauth_access_tokens')
         ->where('user_id',$userId)
         ->where('revoked',false)
         ->count() >= 1 ;
     }

     public function generateToken($user, $message){
         $tokenResult = $user->createToken('Doccure-User');
         $token = $tokenResult->accessToken;
         $user->setAttribute('token', $token);
         return response()->json([
             'status' => true,
             'message' => '',
             'object' => $user,

         ]);
     }
}
