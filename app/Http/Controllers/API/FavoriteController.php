<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\Chalet;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fovarites()
    {
        //
        $favorites = Favorite::where('user_id', '=', Auth()->user()->id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'favorites' => $favorites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function addFavorite(Request $request, $id) {
        $roles = [
            'user_id'=>'exists:users,id',
            'chalet_id'=>'exists:chalets,id',
        ];
        $chalet = Chalet::findOrfail($id);
        $validator = Validator($request->all(), $roles);
        if(!$validator->fails()){
            $favorite = new Favorite();
            $favorite->user_id = Auth()->user()->id;
            $favorite->chalet_id = $chalet->id;
            $isSaved = $favorite->save();
            if($isSaved){
                return ControllerHelper::generateResponse(true, 'Add favorite success');
            }else {
                return ControllerHelper::generateResponse(false, 'Failed add favorite');
            }
        }else{
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }



    // public function store(Request $request, $id)
    // {
    //     //
        // $roles = [
        //     // 'user_id'=>'required|exists:users,id',
        //     // 'chalet_id'=>'required|exists:chalets,id',
        // ];
        // $chalet = Chalet::findOrfail($id);
        // $validator = Validator($request->all(), $roles);
        // if(!$validator->fails()){
    //         $favorite = new Favorite();
    //         $favorite->user_id = Auth()->user()->id;
    //         $favorite->chalet_id = $chalet->id;
    //         $isSaved = $favorite->save();
    //         if($isSaved){
    //             return ControllerHelper::generateResponse(true, 'Add favorite success');
    //         }else {
    //             return ControllerHelper::generateResponse(false, 'Failed add favorite');
    //         }
        // }else{
        //     return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        // }

    // }

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
        $favorite = Favorite::findOrfail($id);
        $isDeleted = $favorite->delete();
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
