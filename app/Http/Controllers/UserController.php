<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected function index() {
        //return view
    }
    public function apiLogin(Request $request) {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $user = auth()->user();
            $token = $user->createToken('API Token')->accessToken;
            return response()->json([
                'token' => $token,
                'message' => 'Login Successful',
                'error' => null
            ], 200);
        }
        return response()->json([
            'message' => 'Invalid username/password',
            'error' => 'invalid_credentials'
        ], 403);
    }
    protected function update($id, Request $request) {

    }
    protected function delete($id) {
        $user = User::find($id);
        if($user==null)
            return 'not found';
        if($user->delete())
            return 'success';
        else
            return 'failed';
    }
    protected function all() {
        if(Auth::user()->isAdmin())
            return User::paginate(10);
        return $this->access_denied();
    }
    protected function get($id) {
        if(!Auth::user()->id==$id && !in_array(Auth::user()->status, [3,4,5]))
            return $this->access_denied();
        $user = User::find($id);
        if($user==null)
            return 'not found';
        return $user;
    }
    private function access_denied() {
        return response()->json([
            'message' => 'Access Denied',
            'error' => 'role_mismatch'
        ], 403);
    }
}
