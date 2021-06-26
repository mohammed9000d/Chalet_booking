<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\Chalet;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
        $reservations = Reservation::where('user_id', '=', Auth()->user()->id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'reservations' => $reservations
        ]);
    }

    //         /**
    //  * Favorite In User Page.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function userReservation()
    // {
    //     //
    //     $reservations = Reservation::where('user_id', '=', Auth()->user()->id)->get();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Success',
    //         'reservations' => $reservations
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $chalet = Chalet::find($id);
        $roles = [
            'user_id'=>'exists:users,id',
            'chalet_id'=>'exists:chalets,id',
            'time'=>'required',
            'date' => 'required|unique:reservations,date,NULL,id,time,'.$request->get('time').',chalet_id,'.$request->get('chalet_id'),
            'status'=>'required',
        ];
        $message = ['date.unique' => 'This timing is reserved'];
        $validator = Validator($request->all(), $roles, $message);
        if(!$validator->fails()) {
            $reservation = new Reservation();
            $reservation->user_id = Auth()->user()->id;
            $reservation->chalet_id = $chalet->id;
            $reservation->date = $request->get('date');
            $reservation->time = $request->get('time');
            $reservation->status = $request->get('status');
            $IsSaved = $reservation->save();
            if($IsSaved) {
                return ControllerHelper::generateResponse(true, 'Created reservation successfully');
            }else {
                return ControllerHelper::generateResponse(false, 'Failed to create reservation');
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
        $reservation = Reservation::findOrfail($id);
        $isDeleted = $reservation->delete();
        if($isDeleted){
            return response()->json([
                'status' => true,
                'message' => 'Deleted Successfully',
            ]);
        }else {
            return response()->json([
                'status' => false,
                'message' => 'Delete Failed',
            ], 400);
        }
    }


}
