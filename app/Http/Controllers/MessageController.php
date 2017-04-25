<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;


//class MessageController extends Controller
//{
//    /**
//     * MessageController constructor.
//     */
//    public function __construct()
//    {
//        if (!empty(auth()->user()->id)) {
//            Talk::setAuthUserId(auth()->user()->id);
//        }
//
//        View::composer('users.partials.peoplelist', function($view) {
//            $threads = Talk::threads();
//            $view->with(compact('threads'))->with(compact('user'));
//        });
//    }
//
//
//    /**
//     * @param $id
//     */
//    public function chatHistory($id)
//    {
//
////        $threads = Talk::threads();
//
////            $this->middleware('auth');
////            Talk::setAuthUserId(Auth::user()->id);
//            $conversations = Talk::getMessagesByUserId($id);
//            $user = '';
//            $messages = [];
//            if(!$conversations) {
//                $user = User::find($id);
//            } else {
//                $user = $conversations->withUser;
//                $messages = $conversations->messages;
//            }
//            $threads = Talk::threads();
//
//        return view('users.conversations',compact('threads'), compact('messages'),compact('user'));
//    }
//    public function ajaxSendMessage(Request $request)
//    {
//        if ($request->ajax()) {
//            $rules = [
//                'message-data'=>'required',
//                '_id'=>'required'
//            ];
//            $this->validate($request, $rules);
//            $body = $request->input('message-data');
//            $userId = $request->input('_id');
//            if ($message = Talk::sendMessageByUserId($userId, $body)) {
//                $html = view('ajax.newMessageHtml', compact('message'))->render();
//                return response()->json(['status'=>'success', 'html'=>$html], 200);
//            }
//        }
//    }
//    public function ajaxDeleteMessage(Request $request, $id)
//    {
//        if ($request->ajax()) {
//            if(Talk::deleteMessage($id)) {
//                return response()->json(['status'=>'success'], 200);
//            }
//            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
//        }
//    }
//
//}



class MessageController extends Controller
{
    protected $authUser;

    public function __construct()
    {
        $this->middleware('auth');
        if (isset(Auth::user()->id)) {
            Talk::setAuthUserId(Auth::user()->id);
        }

        View::composer('users.chat.peoplelist', function ($view) {
            $threads = Talk::threads();
            $view->with(compact('threads'));
        });
    }

    public function chatHistory($id)
    {
        $conversations = Talk::getMessagesByUserId($id);
        $user = '';
        $messages = [];
        if (!$conversations) {
            $user = User::find($id);
        } else {
            $user = $conversations->withUser;
            $messages = $conversations->messages;
        }

        return view('users.chat.conversations', compact('messages', 'user'));
    }

    public function ajaxSendMessage(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'message-data' => 'required',
                '_id' => 'required'
            ];

            $this->validate($request, $rules);

            $body = $request->input('message-data');
            $userId = $request->input('_id');

            if ($message = Talk::sendMessageByUserId($userId, $body)) {
                $html = view('users.chat.newMessageHtml', compact('message'))->render();
                return response()->json(['status' => 'success', 'html' => $html], 200);
            }
        }
    }

    public function ajaxDeleteMessage(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Talk::deleteMessage($id)) {
                return response()->json(['status' => 'success'], 200);
            }

            return response()->json(['status' => 'errors', 'msg' => 'something went wrong'], 401);
        }
    }
}
