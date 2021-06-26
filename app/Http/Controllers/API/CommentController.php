<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\Models\Chalet;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $comments = Chalet::findOrfail($id)->comments()->orderBy('created_at', 'DESC')->take(3)->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'comments' => $comments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $roles = [
            'comment' => 'required|string',
            'rated' => 'required'
        ];
        $chalet = Chalet::findOrfail($id);
        $validator = Validator($request->all(), $roles);
        if(!$validator->fails()) {
            $comment = new Comment();
            $comment->user_id = Auth()->user()->id;
            $comment->chalet_id = $chalet->id;
            $comment->comment = $request->get('comment');
            $comment->rated = $request->get('rated');
            $IsSaved = $comment->save();
            if($IsSaved) {
                return ControllerHelper::generateResponse(true, 'Comment created successfully');
            }else{
                return ControllerHelper::generateResponse(false, 'Failed to create comment!');
            }
        }else{
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
        $request->request->add(['id'=>$id]);
        $roles = [
            'id'=> 'required|integer|exists:comments',
            'user_id'=>'required|exists:users,id',
            'chalet_id'=>'required|exists:chalets,id',
            'comment' => 'required',
            'rated' => 'required'
        ];
        $validator = Validator($request->all(), $roles);
        if(!$validator->fails()) {
            $comment = Comment::findOrfail($id);
            $comment->user_id = $request->get('user_id');
            $comment->chalet_id = $request->get('chalet_id');
            $comment->comment = $request->get('comment');
            $comment->rated = $request->get('rated');
            $IsUpdated = $comment->save();
            if($IsUpdated) {
                return ControllerHelper::generateResponse(true, 'Comment updated successfully');
            }else{
                return ControllerHelper::generateResponse(false, 'Failed to update comment!');
            }
        }else{
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
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
        $comment = Comment::findOrfail($id);
        $isDeleted = $comment->delete();
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
