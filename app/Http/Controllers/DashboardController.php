<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chalet;
use App\Models\City;
use App\Models\Owner;
use App\Models\Reservation;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owners = Owner::where('status', '=', 'Active')->take(5)->get();
        $users = User::where('status', '=', 'Active')->take(5)->get();
        $reservations = Reservation::take(10)->get();
        $owner_count = Owner::count();
        $res_count = Reservation::count();
        $user_count = User::count();
        $chalet_count = Chalet::count();

        return view('admin.dashboard',[
            'owners'=>$owners,
            'users'=>$users,
            'reservations'=>$reservations,
            'owner_count'=>$owner_count,
            'user_count'=>$user_count,
            'res_count'=>$res_count,
            'chalet_count'=>$chalet_count,
        ]);
    }

    public function profile()
    {
        //
        // $city_name = City::get('name');
        return view('admin.profile');

    }


    public function Ownerdash()
    {
        //
        $reservations = Reservation::whereHas('chalet',function($query){
            $query->where('owner_id', '=', Auth()->user()->id);
        })->with('user')->get();
        return view('owner.dashboard',['reservations'=>$reservations]);
    }


}
