<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $roles = [
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required',
            'birth_date' => 'required'
        ];
        $validator = Validator($request->all(), $roles);
        if(!$validator->fails()) {
            $user = new User();
            $user->state_id = $request->get('state_id');
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->password = Hash::make('pass123$');
            $user->mobile = $request->get('mobile');
            $user->gender = $request->get('gender');
            $user->birth_date = $request->get('birth_date');
            $user->status = $request->has('status')?'Active':'InActive';
            if ($request->hasFile('image')) {
                $userImage = $request->file('image');
                $name = time() . '_' . $request->get('first_name') . '.' . $userImage->getClientOriginalExtension();
                $userImage->move('images/user', $name);
                $user->image = $name;
            }
            $isSaved = $user->save();
            if($isSaved) {
                return ControllerHelper::generateResponse(true, 'user created successfully');
            }else {
                return ControllerHelper::generateResponse(false, 'Failed to create user');
            }
        }else {
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
        $request->request->add(['id' => $id]);
        $roles = [
            'id' => 'required|integer|exists:users,id',
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|numeric|unique:users,mobile,'.$id,
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required',
        ];
        $validator = Validator($request->all(), $roles);
        if(!$validator->fails()) {
            $user = User::find($id);
            $user->state_id = $request->get('state_id');
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->password = Hash::make('pass123$');
            $user->mobile = $request->get('mobile');
            $user->gender = $request->get('gender');
            $user->birth_date = $request->get('birth_date');
            $user->status = $request->has('status')?'Active':'InActive';
            if ($request->hasFile('image')) {
                $userImage = $request->file('image');
                $name = time() . '_' . $request->get('first_name') . '.' . $userImage->getClientOriginalExtension();
                $userImage->move('images/user', $name);
                $user->image = $name;
            }
            $isUpdate = $user->save();
            if($isUpdate) {
                return ControllerHelper::generateResponse(true, 'user updated successfully');
            }else {
                return ControllerHelper::generateResponse(false, 'Failed to update user');
            }
        }else {
            return ControllerHelper::generateResponse(false, $validator->getMessageBag());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrfail($id);
        $isDeleted = $user->delete();
        if($isDeleted) {
            return response()->json([
                'status' => true,
                'message' => 'Deleted user successfully',
            ]);
        }else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete user!',
            ], 400);
        }
    }
}
