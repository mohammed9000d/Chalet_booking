<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $favorites = Favorite::all();
        return view('admin.favorites.index',['favorites'=>$favorites]);
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
        return view('admin.favorites.create',['users'=>$users], ['chalets'=>$chalets]);
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
           ]);
           $favorite = new Favorite();
           $favorite->user_id = $request->get('user_id');
           $favorite->chalet_id = $request->get('chalet_id');
           $IsSaved = $favorite->save();
           if($IsSaved){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','Favorite add successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to create favorite');
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
        $favorite = Favorite::findOrfail($id);
        return view('admin.favorites.edit',['users'=>$users, 'chalets'=>$chalets, 'favorite'=>$favorite]);
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
            'id'=> 'required|integer|exists:favorites',
            'user_id'=>'required|exists:users,id',
            'chalet_id'=>'required|exists:chalets,id',
           ]);
           $favorite = Favorite::find($id);
           $favorite->user_id = $request->get('user_id');
           $favorite->chalet_id = $request->get('chalet_id');
           $IsUpdated = $favorite->save();
           if($IsUpdated){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','Favorite updated successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to update favorite');
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
        $isDeleted = Favorite::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Favorite deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete favorite',
                'icon'=>'error'
            ]);

        }
    }
}
