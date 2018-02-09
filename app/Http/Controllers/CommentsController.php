<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function addComment($id){
//
//        $validator = Validator::make($post->all(),[
//            'body' => 'required|min:100',
//        ]);
//        if ($validator->fails()){
//            return redirect()->back()->withErrors($validator->errors())->withInput();
//        }

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->body = request('body');
        $comment->save();
        return back();
    }

    public function decline($id)
    {
        $comment = Comment::find($id);
        if($comment != null ){
            $comment->delete();
            return response()->json([
                'message' => 'Deleted'
            ]);
        }

    }

}
