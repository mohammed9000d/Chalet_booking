<?php

namespace App\Http\Controllers;

use App\Models\Chalet;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all();
        return view('admin.comments.index',['comments'=>$comments]);
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
        return view('admin.comments.create',['users'=>$users], ['chalets'=>$chalets]);
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
            'comment' => 'required',
            'rated' => 'required'
           ]);
           $comment = new Comment();
           $comment->user_id = $request->get('user_id');
           $comment->chalet_id = $request->get('chalet_id');
           $comment->comment = $request->get('comment');
           $comment->rated = $request->get('rated');
           $IsSaved = $comment->save();
           if($IsSaved){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','comment add successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to create comment');
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
        $comment = Comment::findOrfail($id);
        return view('admin.comments.edit',['users'=>$users, 'chalets'=>$chalets, 'comment'=>$comment]);
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
            'id'=> 'required|integer|exists:comments',
            'user_id'=>'required|exists:users,id',
            'chalet_id'=>'required|exists:chalets,id',
            'comment' => 'required',
            'rated' => 'required'
           ]);
           $comment = Comment::find($id);
           $comment->user_id = $request->get('user_id');
           $comment->chalet_id = $request->get('chalet_id');
           $comment->comment = $request->get('comment');
           $comment->rated = $request->get('rated');
           $IsUpdate = $comment->save();
           if($IsUpdate){
               session()->flash('alert-type','alert-success');
               session()->flash('messege','comment updated successfully');
               return redirect()->back();
           }else{
               session()->flash('alert-type','alert-danger');
               session()->flash('messege','Faled to update comment');
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
        $isDeleted = Comment::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Comment and rated deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete comment and rated',
                'icon'=>'error'
            ]);

        }
    }
}
