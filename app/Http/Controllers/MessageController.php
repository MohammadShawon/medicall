<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;
use Auth;

class MessageController extends Controller
{
   public function messages(){
       $user = auth()->user();

       Talk::setAuthUserId(auth()->user()->id);
       $threads = Talk::threads();
       $users = User::where('status','<=',4)->paginate(10);
       return view('users.message',compact('users'), compact('user'),compact('threads'));
   }
    protected $authUser;
//    public function messages()
//    {
//        $this->middleware('auth');
//        Talk::setAuthUserId(Auth::user()->id);
//        View::composer('users.message', function($view) {
//            $threads = Talk::threads();
//            $view->with(compact('threads'));
//        });
//    }
    public function chatHistory($id)
    {
        $threads = Talk::threads();
        $conversations = Talk::getMessagesByUserId($id);
        $user = '';
        $messages = [];
        if(!$conversations) {
            $user = User::find($id);
        } else {
            $user = $conversations->withUser;
            $messages = $conversations->messages;
        }
        return view('users.conversations',compact('threads'), compact('messages'),compact('user'));
    }
    public function ajaxSendMessage(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'message-data'=>'required',
                '_id'=>'required'
            ];
            $this->validate($request, $rules);
            $body = $request->input('message-data');
            $userId = $request->input('_id');
            if ($message = Talk::sendMessageByUserId($userId, $body)) {
                $html = view('ajax.newMessageHtml', compact('message'))->render();
                return response()->json(['status'=>'success', 'html'=>$html], 200);
            }
        }
    }
    public function ajaxDeleteMessage(Request $request, $id)
    {
        if ($request->ajax()) {
            if(Talk::deleteMessage($id)) {
                return response()->json(['status'=>'success'], 200);
            }
            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
        }
    }

}
