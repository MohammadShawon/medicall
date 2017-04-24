<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('users.ask-question',compact('user'));
    }

    public function show(){
        $user = auth()->user();
//        $posts = Post::paginate(10);
        $posts = Post::where("user_id", $user->id)->paginate(10);
        return view('users.show-question',compact('user'),compact('posts'));
    }
    public function showAll(){
        $user = User::where('status','<=',4);
        $posts = Post::paginate(10);
        return view('users.show-question',compact('user'),compact('posts'));
    }
    public function single($id){
        $users = auth()->user();
        $user = User::where('status','<=',4);
        $post = Post::find($id);
        return view('users.single-question',compact('user'),compact('post'),compact('users'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|min:15',
            'body' => 'required|min:100',
            'annonyms' => 'required'
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $ask = new Post();
        $ask->user_id = auth()->user()->id;
        $ask->title = $request->title;
        $ask->body = $request->body;
        $ask->annonyms = $request->annonyms;

        $ask->save();
        Session::flash('message', 'You Question has been Posted.');
        return redirect('/profile');
    }
}
