<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owners = Owner::paginate(3);
        return view('admin.owners.index',['owners'=>$owners]);
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
        return view('admin.owners.create',['cities'=>$cities]);
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
            'email' => 'required|email|unique:owners,email',
            'mobile' => 'required|numeric|unique:owners,mobile',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
        ]);

        $owner = new Owner();
        $owner->first_name = $request->get('first_name');
        $owner->last_name = $request->get('last_name');
        $owner->email = $request->get('email');
        $owner->mobile = $request->get('mobile');
        $owner->password = Hash::make('pass123$');
        $owner->state_id = $request->get('state_id');
        $owner->birth_date = $request->get('birth_date');
        $owner->gender = $request->get('gender');
        $owner->status = $request->has('status')?'Active':'InActive';

        if ($request->hasFile('image')) {
            $ownerImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $ownerImage->getClientOriginalExtension();
            $ownerImage->move('images/owner', $name);
            $owner->image = $name;
        }

        $isSave = $owner->save();
        if($isSave){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Owner created successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create owner');
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
        $owner = Owner::findOrfail($id);
        return view('admin.owners.edit',['owner' => $owner], ['cities' => $cities]);
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
            'id'=> 'required|integer|exists:owners|unique:owners,email,'.$id,
            'id'=> 'required|integer|exists:owners|unique:owners,mobile,'.$id,
            'state_id'=>'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'gender' => 'required|string|in:Male,Female',
            'image' => 'required|image',
            'status' => 'required|in:on',
        ]);

        $owner =Owner::findOrfail($id);
        $owner->first_name = $request->get('first_name');
        $owner->last_name = $request->get('last_name');
        $owner->email = $request->get('email');
        $owner->mobile = $request->get('mobile');
        $owner->password = Hash::make('pass123$');
        $owner->state_id = $request->get('state_id');
        $owner->birth_date = $request->get('birth_date');
        $owner->gender = $request->get('gender');
        $owner->status = $request->has('status')?'Active':'InActive';

        if ($request->hasFile('image')) {
            $ownerImage = $request->file('image');
            $name = time() . '_' . $request->get('first_name') . '.' . $ownerImage->getClientOriginalExtension();
            $ownerImage->move('images/owner', $name);
            $owner->image = $name;
        }

        $updated = $owner->save();
        if($updated){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Owner updated successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to update owner');
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
        $isDeleted = Owner::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Owner deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete owner',
                'icon'=>'error'
            ]);

        }
    }
}
