<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;

class MessageController extends Controller
{
   public function messages(){
       $user = auth()->user();
       return view('users.message', compact('user'));
   }
}
