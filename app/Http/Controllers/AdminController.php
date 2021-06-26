<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
        return view('admin.admins.index',['admins' => $admins]);
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
        return view('admin.admins.create',['cities' => $cities]);
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
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|numeric|unique:admins,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
            'birth_date' => 'required',
        ]);

        $admin = new Admin();
        $admin->first_name = $request->get('first_name');
        $admin->last_name = $request->get('last_name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->password = Hash::make('pass123$');
        $admin->state_id = $request->get('state_id');
        $admin->birth_date = $request->get('birth_date');
        $admin->gender = $request->get('gender');
        $admin->status = $request->has('status')?'Active':'InActive';

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
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create admin');
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
        $admin = Admin::findOrfail($id);
        return view('admin.admins.edit',['admin' => $admin], ['cities' => $cities]);
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
            'id'=> 'required|integer|exists:admins|unique:admins,email,'.$id,
            'id'=> 'required|integer|exists:admins|unique:admins,mobile,'.$id,
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
        ]);

        $admin =Admin::findOrfail($id);
        $admin->first_name = $request->get('first_name');
        $admin->last_name = $request->get('last_name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->password = Hash::make('pass123$');
        $admin->state_id = $request->get('state_id');
        $admin->birth_date = $request->get('birth_date');
        $admin->gender = $request->get('gender');
        $admin->status = $request->has('status')?'Active':'InActive';

        if ($request->hasFile('image')) {
            $adminImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/admin', $name);
            $admin->image = $name;
        }

        $updated = $admin->save();
        if($updated){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Admin updated successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to update admin');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Admin::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Admin deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete admin',
                'icon'=>'error'
            ]);

        }
    }
}
