<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::with('chalet','user')->get();
        return view('admin.reservations.index',['reservations'=>$reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::where('status', '=', 'Active')->get();
        $chalets = Chalet::where('status', '=', 'Active')->get();
        return view('admin.reservations.create',['users'=>$users], ['chalets'=>$chalets]);
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
            'user_id'=>'required|exists:users,id',
            'chalet_id'=>'required|exists:chalets,id',
            'time'=>'required',
            'date' => 'required|unique:reservations,date,NULL,id,time,'.$request->get('time').',chalet_id,'.$request->get('chalet_id'),
            'status'=>'required',
        ],['date.unique' => 'This timing is reserved']);

            $reservation = new Reservation();
            $reservation->user_id = $request->get('user_id');
            $reservation->chalet_id = $request->get('chalet_id');
            $reservation->date = $request->get('date');
            $reservation->time = $request->get('time');
            $reservation->status = $request->get('status');
            $IsSaved = $reservation->save();
            if($IsSaved){
                session()->flash('alert-type','alert-success');
                session()->flash('messege','reservation add successfully');
                return redirect()->back();
            }else{
                session()->flash('alert-type','alert-danger');
                session()->flash('messege','Faled to create reservation');
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
        $users = User::where('status', '=', 'Active')->get();
        $chalets = Chalet::where('status', '=', 'Active')->get();
        $reservation = Reservation::findOrfail($id);
        return view('admin.reservations.edit',['users'=>$users, 'chalets'=>$chalets, 'reservation' => $reservation]);
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
            'id'=> 'required|integer|exists:reservations',
            'user_id'=>'required|exists:users,id',
            'chalet_id'=>'required|exists:chalets,id',
            'time'=>'required',
            'date' => 'required|unique:reservations,date,'.$id.',id,time,'.$request->get('time').',chalet_id,'.$request->get('chalet_id'),
            'status'=>'required',
        ],['date.unique' => 'This timing is reserved']);

           $reservation = Reservation::find($id);
           $reservation->user_id = $request->get('user_id');
           $reservation->chalet_id = $request->get('chalet_id');
           $reservation->date = $request->get('date');
           $reservation->time = $request->get('time');
           $reservation->status = $request->get('status');
           $IsUpdate = $reservation->save();
           if($IsUpdate){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','reservation updated successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to update reservation');
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
        $isDeleted = Reservation::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Reservation deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete Reservation',
                'icon'=>'error'
            ]);

        }
    }
}
