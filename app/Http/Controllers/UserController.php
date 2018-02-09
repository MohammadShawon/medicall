<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Post;

class UserController extends Controller
{
    protected function index() {
        $user = auth()->user();
        if ($user){
           // $posts = Post::where('user_id',$user->id);
            $appointments = Appointment::where("user_id", $user->id)->get();
            return view('users.profile',compact('appointments'),compact('user'));
        }
        else{
            return view('auth.register');
        }

    }
    protected function appointment(){
        $user = auth()->user();
        if ($user){

            return view('users.appointment',compact('user'));
        }
        else{
            return view('auth.login');
        }

    }
    protected function appointmentinfo(){
        $user = auth()->user();
        return view('users.myappointment-info',compact('user'));
    }
    protected function schedule(){
        $user = auth()->user();
        return view('users.myschedule',compact('user'));
    }
    protected function myappointment(){
        $user = auth()->user();
        return view('users.appointment-list',compact('user'));
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
    protected function update($id=null, Request $request) {
        if($id!=null && !in_array(Auth::user()->status, [5,6]))
            return $this->redirectBack($request->ajax(), 'Access Denied', 'role_mismatch', 403);
        $user = ($id==null)?auth()->user():User::find($id);
        if($user==null)
            $this->redirectBack($request->ajax(), 'User not found', 'not_found', 404);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'birthday' => 'required|date',
            'about_me' => 'nullable',
            'city' => 'nullable',
            'occupation' => 'nullable',
            'phone' => 'nullable',
            'blood_group' => 'nullable',
            'address' => 'nullable'
        ]);
        if($validator->fails()) {
            $this->redirectBack($request->ajax(), $validator->errors()->first(), 'validation_error', 422);
        }
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        if($request->about_me) $user->bio = $request->about_me;
        if($request->city) $user->city = $request->city;
        if($request->occupation) $user->occupation = $request->occupation;
        if($request->phone) $user->phone = $request->phone;
        if($request->blood_group) $user->blood_group = $request->blood_group;
        if($request->address) $user->address = $request->address;

        if($request->hasFile("profile_picture") && $request->file("profile_picture")->isValid()) {
            $file = $request->profile_picture;
            $fname = md5(time()).".".$file->extension();
            $file->storeAs("public/images/profile/", $fname);
            @unlink(storage_path("app/public").$user->photo);
            $user->photo = "/images/profile/".$fname;
        }

        $user->save();
        if($request->ajax())
            return $user;
        else
            return redirect()->intended('/profile')->with('message', 'Profile updated successfully.');
    }
    protected function delete($id, Request $request) {
        $user = User::find($id);
        if($user==null)
            return $this->redirectBack($request->ajax(), 'User not found', 'not_found', 404);
        if($user->delete())
            return $this->redirectBack($request->ajax(), 'User deleted', null, 200);
        else
            return $this->redirectBack($request->ajax(), 'Failed to delete user', 'failed', 402);
    }
    protected function all(Request $request) {
        if(Auth::user()->isAdmin())
            return User::paginate(10);
        return $this->send($request->ajax(), 'Access Denied', 'role_mismatch', 403);
    }
    protected function get($id=null, Request $request) {
        if($id!=null && !in_array(Auth::user()->status, [3,4,5]))
            return $this->redirectBack($request->ajax(), 'Access Denied', 'role_mismatch', 403);
        $user = ($id==null)?auth()->user():User::find($id);
        if($user==null)
            return $this->redirectBack($request->ajax(), 'User not found', 'not_found', 404);
        if($request->ajax())
            return $user;
        else
            return view('users.profile', compact('user'));
    }

    public function verifyUser($token) {
        $user = User::where('mail_validation', $token)->first();
        if(!$user) return response('Not found', 404);
        $user->status = ($user->status==2?3:1);
        $user->save();
        return redirect()->intended('/')->with('message', 'Your account has been verified');
    }

    private function redirectBack($ajax, $message, $error, $code) {
        if($ajax) {
            return response()->json([
                'message' => $message,
                'error' => $error
            ], $code);
        }
        else
        {
            $bag = new MessageBag();
            $bag->add('message', $message);
            return redirect()->back()->withErrors($bag)->withInput();
        }
    }

    public function messages(){

        $users = User::where('status','<=',4)->paginate(10);
        return view('users.message',compact('users'));
    }
}
