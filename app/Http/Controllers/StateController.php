<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::with('city')->get();
        return view('admin.states.index', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::where('status', '=', 'Active')->get();
        return view('admin.states.create',['cities' => $cities]);
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
            'city_id'=>'required|exists:cities,id',
            'name'=>'required|string|min:3|max:15',
            'status'=>'in:on'
           ],[
               'city_id.required'=> 'Please ,select city'
           ]);
           $state = new State();
           $state->city_id = $request->get('city_id');
           $state->name = $request->get('name');
           $state->status = $request->has('status') ?'Active' : 'InActive';
           $IsSaved = $state->save();
           if($IsSaved){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','state add successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to create state');
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
        $cities = City::where('status','=','Active')->get();
        $state = State::findOrfail($id);
        return view('admin.states.edit',['cities'=>$cities],['state'=>$state]);
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
            'city_id'=>'required|integer|exists:cities,id',
            'name'=>'required|string|min:3|max:15',
            'status'=>'in:on',
            'id'=>'required|integer|exists:states'
        ],[
            'city_id.required'=>'please, enter city name'
        ]);
           $state =State::find($id);
           $state->city_id = $request->get('city_id');
           $state->name = $request->get('name');
           $state->status = $request->has('status') ?'Active' : 'InActive';
           $IsSaved = $state->save();
           if($IsSaved){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','State updated successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to update state');
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
        $isDeleted = State::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'State Deleted Successfully',
                'icon'=>'success'
            ],200);
        }else{
            return response()->json([
                'title'=>'Failde',
                'text'=>'Failde To Delete state!',
                'icon'=>'error'
            ],400);

        }
    }
}
