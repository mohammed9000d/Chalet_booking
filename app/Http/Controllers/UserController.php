<?php

namespace App\Http\Controllers;

use App\Models\City;
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
        return view('admin.users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::with('states')->get();
        return view('admin.users.create',['cities' => $cities]);
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
        $request->validate([
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
        ]);

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make('pass123$');
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
            session()->flash('alert-type','alert-success');
            session()->flash('message','user created successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create user');
            return redirect()->back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cities = City::with('states')->get();
        $user = User::findOrfail($id);
        return view('admin.users.edit',['user' => $user], ['cities' => $cities]);
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
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=> 'required|integer|exists:users|unique:users,email,'.$id,
            'id'=> 'required|integer|exists:users|unique:users,mobile,'.$id,
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
        ]);

        $user =User::findOrfail($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make('pass123$');
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

        $updated = $user->save();
        if($updated){
            session()->flash('alert-type','alert-success');
            session()->flash('message','User updated successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to update user');
            return redirect()->back();
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
        $isDeleted = User::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'User deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete user',
                'icon'=>'error'
            ]);

            }
    }
}
