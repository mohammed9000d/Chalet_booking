<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use App\Models\City;
use App\Models\Owner;
use Illuminate\Http\Request;

class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chalets = Chalet::all();
        return view('admin.chalets.index',['chalets'=>$chalets]);
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
        $owners = Owner::where('status', '=', 'Active')->get();
        return view('admin.chalets.create', ['cities'=>$cities], ['owners'=>$owners]);
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
            'owner_id'=>'required|exists:owners,id',
            'state_id'=>'required|integer|exists:states,id',
            'name' => 'required|string|min:3|max:30',
            'image' => 'required|image',
            'status' => 'required|in:on',
            'address'=>'required|string',
            'price' => 'required',
            'description' => 'required',
            'seating_places' => 'required',
            'swimming_pools' => 'required',
            'accompanying' => 'required',
            'washrooms' => 'required',
            'kitchen_facilities' => 'required',
            'bedrooms' => 'required'
        ]);

        $chalet = new Chalet();
        $chalet->name = $request->get('name');
        $chalet->owner_id = $request->get('owner_id');
        $chalet->state_id = $request->get('state_id');
        $chalet->address = $request->get('address');
        $chalet->chalet_space = $request->get('chalet_space');
        $chalet->price = $request->get('price');
        $chalet->description = $request->get('description');
        $chalet->seating_places = $request->get('seating_places');
        $chalet->swimming_pools = $request->get('swimming_pools');
        $chalet->accompanying = $request->get('accompanying');
        $chalet->washrooms = $request->get('washrooms');
        $chalet->kitchen_facilities = $request->get('kitchen_facilities');
        $chalet->bedrooms = $request->get('bedrooms');
        $chalet->status = $request->has('status')?'Active':'InActive';

        if ($request->hasFile('image')) {
            $chaletImage = $request->file('image');
            $name = time() . '_' . $request->get('name') . '.' . $chaletImage->getClientOriginalExtension();
            $chaletImage->move('images/chalet', $name);
            $chalet->image = $name;
        }

        $isSaved = $chalet->save();
        if($isSaved){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Chalet created successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to create chalet');
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
        $owners = Owner::where('status', '=', 'Active')->get();
        $chalet = Chalet::findOrfail($id);
        return view('admin.chalets.edit', ['cities'=>$cities, 'owners'=>$owners, 'chalet'=>$chalet]);
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
            'id'=> 'required|integer|exists:chalets',
            'owner_id'=>'required|exists:owners,id',
            'state_id'=>'required|integer|exists:states,id',
            'name' => 'required|string|min:3|max:30',
            'image' => 'required|image',
            'status' => 'required|in:on',
            'address'=>'required|string',
            'price' => 'required',
            'description' => 'required',
            'seating_places' => 'required',
            'swimming_pools' => 'required',
            'accompanying' => 'required',
            'washrooms' => 'required',
            'kitchen_facilities' => 'required',
            'bedrooms' => 'required'
        ]);

        $chalet = Chalet::find($id);
        $chalet->name = $request->get('name');
        $chalet->owner_id = $request->get('owner_id');
        $chalet->state_id = $request->get('state_id');
        $chalet->address = $request->get('address');
        $chalet->chalet_space = $request->get('chalet_space');
        $chalet->price = $request->get('price');
        $chalet->description = $request->get('description');
        $chalet->seating_places = $request->get('seating_places');
        $chalet->swimming_pools = $request->get('swimming_pools');
        $chalet->accompanying = $request->get('accompanying');
        $chalet->washrooms = $request->get('washrooms');
        $chalet->kitchen_facilities = $request->get('kitchen_facilities');
        $chalet->bedrooms = $request->get('bedrooms');
        $chalet->status = $request->has('status')?'Active':'InActive';

        if ($request->hasFile('image')) {
            $chaletImage = $request->file('image');
            $name = time() . '_' . $request->get('name') . '.' . $chaletImage->getClientOriginalExtension();
            $chaletImage->move('images/chalet', $name);
            $chalet->image = $name;
        }

        $isUpdated = $chalet->save();
        if($isUpdated){
            session()->flash('alert-type','alert-success');
            session()->flash('message','Chalet updated successfully');
            return redirect()->back();
        }else{
            session()->flash('alert-type','alert-danger');
            session()->flash('message','Failed to update chalet');
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
        $isDeleted = Chalet::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Chalet deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete chalet',
                'icon'=>'error'
            ]);

        }
    }
}
